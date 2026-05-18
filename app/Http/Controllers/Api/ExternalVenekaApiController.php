<?php

// Made by: Daniela Salazar Amaya

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Api\VenekaApiService;
use Illuminate\View\View;

class ExternalVenekaApiController extends Controller
{
    public function index(VenekaApiService $service): View
    {
        $viewData = [];
        $viewData['products'] = $service->getProducts();

        if (empty($viewData['products'])) {
            return view('allied_products.index')->with('error', __('alliedProducts.error.description'));
        }

        return view('allied_products.index')->with('viewData', $viewData);
    }
}