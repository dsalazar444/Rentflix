<?php

/** Made by: Samuel Martínez Arteaga */

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function add(Request $request): RedirectResponse
    {
        $id = $request->route('id');
        $cart = session()->get('cart', []);

        if (! in_array($id, $cart)) {
            $cart[] = $id;
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Película añadida al carrito');
    }

    public function remove(Request $request): RedirectResponse
    {
        $id = $request->route('id');
        $cart = session()->get('cart', []);
        $key = array_search($id, $cart);

        if ($key !== false) {
            unset($cart[$key]);
            session()->put('cart', array_values($cart));
        }

        return redirect()->back();
    }
}
