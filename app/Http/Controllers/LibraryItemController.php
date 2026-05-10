<?php

// Made by: Laura Andrea Castrillón Fajardo

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
        $viewData['expiringSoon'] = $this->libraryItemService->soonToExpire(session('user_id'));

        return view('library.index')->with('viewData', $viewData);
    }

    // public function index(): View
    // {
    //     $user = User::find(session('user_id'));

    //     $viewData = [];
    //     $viewData['libraryItems'] = $user->getLibraryItems(); 
    //     $viewData['expiringSoon'] = $this->libraryItemService->soonToExpire(session('user_id'));

    //     return view('library.index')->with('viewData', $viewData);
    // }
}
