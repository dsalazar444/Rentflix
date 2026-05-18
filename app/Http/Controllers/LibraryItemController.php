<?php

// Made by: Laura Andrea Castrillón Fajardo

namespace App\Http\Controllers;

use App\Models\User;
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
        $user = User::find(session('user_id'));

        $viewData = [];
        $viewData['libraryItems'] = $user->getLibraryItems();
        $viewData['expiringSoon'] = $this->libraryItemService->notifyMovieSoonToExpire(session('user_id'));

        return view('library.index')->with('viewData', $viewData);
    }
}
