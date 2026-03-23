<?php

namespace App\Http\Controllers;

use App\Models\LibraryItem;
use Illuminate\View\View;

class LibraryItemController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['libraryItems'] = LibraryItem::with('user', 'movie')->get();

        return view('collections.library')->with('viewData', $viewData);
    }
}
