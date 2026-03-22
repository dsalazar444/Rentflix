<?php

// Autora: Daniela Salazar

namespace App\Http\Controllers;

use App\Http\Requests\StoreBillRequest;
use App\Models\Bill;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BillController extends Controller
{
    public function index(): View
    {

        $viewData = [];
        $viewData['title'] = 'Bills - RentFlix';
        $viewData['subtitle'] = 'List of bills';
        $viewData['bills'] = Bill::all();

        return view('bill.index')->with('viewData', $viewData);
    }

    // Index-like function but for a single product
    public function show(string $id): View
    {

        $viewData = [];
        $bill = Bill::findOrFail($id);
        $viewData['title'] = 'Bill '.$id.' - RentFlix';
        $viewData['subtitle'] = 'Bill '.$id.' - Bill information';
        $viewData['bill'] = $bill;

        return view('bill.show')->with('viewData', $viewData);
    }

    public function create(): View
    {

        $viewData = [];
        $viewData['title'] = 'Create bill';

        return view('bill.create')->with('viewData', $viewData);
    }

    public function save(StoreBillRequest $request): RedirectResponse
    {

        $request->validate([
            'price' => 'required|numeric|min:0',
            'address' => 'required|string|max:300',
        ]);

        Bill::create($request->only(['price', 'address']));

        return redirect()->route('bill.create')->with('success', 'Bill created successfully!');
    }

    public function delete(string $id): RedirectResponse
    {
        Bill::destroy($id);

        return redirect()->route('bill.index')->with('success', 'Bill deleted successfully!');
    }
}
