<?php

// Made by: Daniela Salazar Amaya

namespace App\Http\Controllers;

use Exception;
use App\Models\Bill;
use App\Models\User;
use App\Models\Movie;
use App\Http\Requests\CreateBillRequest;
use App\Services\LibraryItemService;
use App\Services\BillService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BillManagmentController extends Controller
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
}