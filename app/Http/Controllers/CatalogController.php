<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\View\View;

class CatalogController extends Controller{

    public function index(): View
    {
        $viewData = [];
        $viewData['movies'] = Movie::all();

        return view('admin.movie.index')->with('viewData', $viewData);
    }

}