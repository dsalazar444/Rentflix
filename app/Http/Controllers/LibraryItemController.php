<?php

namespace App\Http\Controllers;

use App\Models\LibraryItem;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class LibraryItemController extends Controller
{


    public function index(): View
    {
        $viewData = [];
        $viewData['libraryItems'] = LibraryItem::all();

        return view('collections.library')->with('viewData', $viewData);
    }
}