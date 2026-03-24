<?php

// Made by: Laura Andrea Castrillón Fajardo

namespace App\Http\Controllers;

use App\Models\LibraryItem;
use App\Models\Movie;
use App\Models\WishlistItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatalogController extends Controller
{
    public function index(Request $request): View
    {
        $selectedGenre = $request->query('genre', 'all');
        $selectedSort = $request->query('sort', 'priceAsc');

        $moviesQuery = Movie::query();

        if ($selectedGenre !== 'all') {
            $moviesQuery->where('genre', $selectedGenre);
        }

        if ($selectedSort === 'priceDesc') {
            $moviesQuery->orderBy('price', 'desc');
        } elseif ($selectedSort === 'available') {
            $moviesQuery->where('quantity', '>', 0);
            $moviesQuery->orderBy('title', 'asc');
        } else {
            $moviesQuery->orderBy('price', 'asc');
        }

        $movies = $moviesQuery->get();

        $viewData = [];
        $viewData['movies'] = $movies;
        $viewData['moviesCount'] = $movies->count();
        $viewData['newdlyAdded'] = Movie::orderBy('created_at', 'desc')->take(5)->get();
        $viewData['featured'] = Movie::orderBy('quantity_views', 'desc')->take(4)->get();
        $viewData['selectedGenre'] = $selectedGenre;
        $viewData['selectedSort'] = $selectedSort;

        return view('catalog.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $movie = Movie::find($id);
        if (! $movie) {
            return redirect()->route('catalog.index');
        }

        $viewData = [];
        $viewData['movie'] = $movie;
        $viewData['isInWishlist'] = false;
        $viewData['isInLibrary'] = false;
        $viewData['isInShoppingCart'] = false;

        $shoppingCart = array_map('intval', session()->get('cart', []));
        $viewData['isInShoppingCart'] = in_array($movie->getId(), $shoppingCart, true);

        if (session('user_id')) {
            $viewData['isInWishlist'] = WishlistItem::where('user_id', session('user_id'))
                ->where('movie_id', $movie->getId())
                ->exists();
            $viewData['isInLibrary'] = LibraryItem::where('user_id', session('user_id'))
                ->where('movie_id', $movie->getId())
                ->exists();
        }

        return view('catalog.show')->with('viewData', $viewData);
    }
}
