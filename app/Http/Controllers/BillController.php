<?php

// Made by: Daniela Salazar Amaya

namespace App\Http\Controllers;

use Exception;
use App\Models\Bill;
use App\Http\Requests\CreateBillRequest;
use App\Services\LibraryItemService;
use App\Services\BillService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BillController extends Controller
{
    private LibraryItemService $libraryItemService;

    public function __construct(LibraryItemService $libraryItemService)
    {
        $this->libraryItemService = $libraryItemService;
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

            return redirect()->back()->with('success', __('billProcessPayment.statusModal.processPayment.success'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', __('billProcessPayment.statusModal.processPayment.error'));
        }
    }

    public function listBills(): View
    {
        $userId = session('user_id');
        $viewData = [];
        $viewData['bills'] = Bill::where('user_id', $userId)->with('items.movie')->get();

        return view('bill.listBills')->with('viewData', $viewData);
    }

    public function download(string $id, BillService $service): Response|RedirectResponse
    {
        return $service->downloadBill($id);
    }

    public function send(string $id, BillService $service): RedirectResponse
    {
        return $service->sendBill($id);
    }
}
