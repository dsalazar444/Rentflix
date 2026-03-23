<?php

namespace App\Http\Controllers;

use App\Models\LibraryItem;
use App\Services\LibraryItemService;
use Illuminate\View\View;

class LibraryItemController extends Controller
{
    private LibraryItemService $libraryItemService;

    public function __construct(LibraryItemService $libraryItemService)
    {
        $this->libraryItemService = $libraryItemService;
    }

    public function index(): View
    {
        $viewData = [];
        $viewData['libraryItems'] = LibraryItem::where('user_id', session('user_id'))
            ->with('user', 'movie')
            ->get();
        $viewData['expiringSoon'] = $this->libraryItemService->notify(session('user_id'));

        return view('collections.library')->with('viewData', $viewData);
    }
}
