<?php

// Made by: Daniela Salazar Amaya

namespace App\Http\Controllers;

use Exception;
use App\Mail\InvoiceMail;
use App\Models\Bill;
use App\Models\User;
use App\Models\Movie;
use App\Http\Requests\CreateBillRequest;
use App\Services\LibraryItemService;
use App\Services\BillService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\View\View;

class BillController extends Controller
{
    private LibraryItemService $libraryItemService;

    public function __construct(LibraryItemService $libraryItemService)
    {
        $this->libraryItemService = $libraryItemService;
    }

    public function index(): View
    {
        $viewData = [];
        $viewData['bills'] = Bill::with('items.movie')->get();
        $viewData['users'] = User::all();
        $viewData['movies'] = Movie::all();

        return view('admin.bill.index')->with('viewData', $viewData);
    }

    public function save(CreateBillRequest $request): RedirectResponse
    {
        try {
            Bill::createWithItems(
                [
                    'user_id' => $request->user_id,
                    'price' => $request->price,
                    'address' => $request->address,
                ],
                $request->items ?? []
            );

            return redirect()->back()->with('success', 'Factura creada correctamente');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al crear la factura. Por favor, intenta de nuevo.');
        }
    }

    public function delete(string $id): RedirectResponse
    {
        $bill = Bill::find($id);
        if (! $bill) {
            return redirect()->route('admin.bill.index');
        }
        $bill->delete();

        return redirect()->route('admin.bill.index')->with('success', 'Factura eliminada correctamente');
    }

    public function update(Request $request, int $id): RedirectResponse
    {

        $bill = Bill::find($id);

        if (! $bill) {
            return redirect()->route('admin.bill.index')->with('failure', 'Factura no existe');
        }

        if ($request->has('items')) {
            $bill->syncItems($request->items);
        }

        return redirect()->route('admin.bill.index')->with('success', 'Factura actualizada correctamente');
    }

    public function processPayment(CreateBillRequest $request): RedirectResponse
    {
        try {
            $bill = Bill::createWithItems(
                [
                    'user_id' => $request->user_id,
                    'price' => $request->price,
                    'address' => $request->address,
                ],
                $request->items ?? []
            );

            // Sync purchased movies to user's library
            $this->libraryItemService->synchLibraryAfterPurchase($bill);

            // Clean shopping cart from session
            session()->forget('cart');

            // TODO. Poner con variable en la vista porque esto puede estar en distintos idiomas
            return redirect()->back()->with('success', 'Pago procesado correctamente');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al procesar pago. Por favor, intenta de nuevo.');
        }
    }

    public function listBills(): View
    {
        $userId = session('user_id');
        $viewData = [];
        $viewData['bills'] = Bill::where('user_id', $userId)->with('items.movie')->get();

        return view('bill.listBills')->with('viewData', $viewData);
    }

    public function download(string $id, BillService $service): Response
    {
        return $service->downloadBill($id);
    }

    public function send(string $id, BillService $service): RedirectResponse
    {
        return $service->sendBill($id);
    }
}
