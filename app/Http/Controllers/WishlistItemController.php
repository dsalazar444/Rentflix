<?php

/** Made by: Samuel Martínez Arteaga */

namespace App\Http\Controllers;

use App\Models\WishlistItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class WishlistItemController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['wishlistItems'] = WishlistItem::with('movie')
            ->where('user_id', session('user_id'))
            ->get();

        return view('collections.wishlist')->with('viewData', $viewData);
    }

    public function add(Request $request): RedirectResponse
    {

        if (!session('user_id')) {
            return redirect()->route('auth.index')->with('error', 'Debes iniciar sesión para añadir películas a tu lista de deseos');
        }

        $wishlistItem = new WishlistItem();
        $wishlistItem->setUserId(session('user_id'));
        $wishlistItem->setMovieId($request->route('id'));
        $wishlistItem->save();

        return redirect()->back()->with('success', 'Película añadida a la lista de deseos');
    }

    public function delete(Request $request): RedirectResponse
    {
        $wishlistItem = WishlistItem::where('user_id', session('user_id'))
            ->where('movie_id', $request->route('id'))
            ->first();

        if ($wishlistItem) {
            $wishlistItem->delete();
            return redirect()->back()->with('success', 'Película eliminada de la lista de deseos');
        }

        return redirect()->back()->with('error', 'Película no encontrada en la lista de deseos');
    }
}
