<?php

// Made by: Daniela Salazar Amaya

namespace App\Services;

use App\Mail\InvoiceMail;
use App\Models\Bill;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class BillService
{
    public function downloadBill(string $id): Response|RedirectResponse
    {
        $bill = Bill::with('items.movie', 'user')->find($id);

        if (! $bill) {
            return redirect()->back()->with('error', __('billService.statusModal.notFound.error'));
        }

        return $this->generatePdf($bill);
    }

    public function generatePdf(Bill $bill): Response
    {
        if (! $bill->relationLoaded('items')) {
            $bill->load('items.movie');
        }

        $pdf = Pdf::loadView('bill.pdf', ['bill' => $bill]);

        return $pdf->download('factura_id_'.$bill->getId().'.pdf');
    }

    public function sendBill(string $id): RedirectResponse
    {
        $bill = Bill::with('user')->find($id);

        if (! $bill) {
            return redirect()->back()->with('error', __('billService.statusModal.notFound.error'));
        }

        try {

            Mail::to($bill->user->getEmail())->send(new InvoiceMail($bill));

            return redirect()->back()->with('success', __('billService.statusModal.send.success'));

        } catch (\Exception $e) {
            return redirect()->back()->with('error', __('billService.statusModal.send.error'));
        }
    }
}
