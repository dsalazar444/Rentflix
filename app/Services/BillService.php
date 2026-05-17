<?php

// Made by: Daniela Salazar Amaya

namespace App\Services;

use Illuminate\Support\Collection;

class BillService
{
    public function calculateTotalPrice(Bill $bill): int
    {
        return $bill->items->sum(function ($item) {
            return $item->getSubtotal();
        });
    }

    public function downloadBill(string $id): Response
    {
        $bill = Bill::with('items.movie', 'user')->find($id);

        if (! $bill) {
            // TODO. Tambien poner en una variablita en view
            abort(404, 'Factura no encontrada');
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

 
}