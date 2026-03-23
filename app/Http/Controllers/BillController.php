<?php

// Made by: Daniela Salazar

namespace App\Http\Controllers;

use App\Http\Requests\CreateBillRequest;
use App\Models\Bill;
use App\Models\LibraryItem;
use App\Models\Movie;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BillController extends Controller
{
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
            LibraryItem::synchLibraryAfterPurchase($bill);

            // Clean shopping cart from session
            session()->forget('cart');

            return redirect()->back()->with('success', 'Pago procesado correctamente');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al procesar pago. Por favor, intenta de nuevo.');
        }
    }
}
