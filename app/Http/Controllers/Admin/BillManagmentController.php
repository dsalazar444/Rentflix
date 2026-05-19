<?php

// Made by: Daniela Salazar Amaya

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBillRequest;
use App\Models\Bill;
use App\Models\Movie;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BillManagmentController extends Controller
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

            return redirect()->route('admin.bill.index')->with('success', __('adminBillIndex.statusModal.save.success'));
        } catch (Exception $e) {
            return redirect()->route('admin.bill.index')->with('error', __('adminBillIndex.statusModal.save.error'));
        }
    }

    public function delete(string $id): RedirectResponse
    {
        $bill = Bill::find($id);
        if (! $bill) {
            return redirect()->route('admin.bill.index')->with('error', __('adminBillIndex.statusModal.notFound.error'));
        }
        $bill->delete();

        return redirect()->route('admin.bill.index')->with('success', __('adminBillIndex.statusModal.delete.success'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {

        $bill = Bill::find($id);

        if (! $bill) {
            return redirect()->route('admin.bill.index')->with('error', __('adminBillIndex.statusModal.update.error'));
        }

        if ($request->has('items')) {
            $bill->syncItems($request->items);
        }

        return redirect()->route('admin.bill.index')->with('success', __('adminBillIndex.statusModal.update.success'));
    }
}
