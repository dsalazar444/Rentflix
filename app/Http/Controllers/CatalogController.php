<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\WishlistItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CatalogController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['movies'] = Movie::all();
        $viewData['newdlyAdded'] = Movie::orderBy('created_at', 'desc')->take(5)->get();

        return view('catalog.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $viewData = [];
        $movie = Movie::find($id);
        if (! $movie) {
            return redirect()->route('catalog.index');
        }
        $viewData['movie'] = $movie;
        $viewData['isInWishlist'] = false;

        if (session('user_id')) {
            $viewData['isInWishlist'] = WishlistItem::where('user_id', session('user_id'))
                ->where('movie_id', $movie->getId())
                ->exists();
        }

        return view('catalog.show')->with('viewData', $viewData);
    }
}
