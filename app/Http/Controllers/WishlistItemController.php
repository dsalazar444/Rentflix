<?php

// Made by: Samuel Martínez Arteaga

namespace App\Http\Controllers;

use App\Models\WishlistItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Utils\UserDataUtils;

class WishlistItemController extends Controller
{

    public function index(): View|RedirectResponse
    {
        $user = UserDataUtils::bringSessionUser();

        if (!$user) {
            return redirect()->route('auth.index');
        }

        $viewData = [];
        $viewData['wishlistItems'] = $user->getWishlistItems();

        return view('wishlist.index')->with('viewData', $viewData);
    }

    public function add(Request $request): RedirectResponse
    {
        $user = UserDataUtils::bringSessionUser();

        if (!$user) {
            return redirect()->route('auth.index');
        }
        WishlistItem::create([
            'user_id' => $user->getId(),
            'movie_id' => $request->route('id'),
        ]);

        return redirect()->back()->with('success', __('whishlistIndex.addSuccess'));
    }

    public function delete(Request $request): RedirectResponse
    {

        $wishlistItem = WishlistItem::where('user_id', session('user_id'))
            ->where('movie_id', $request->route('id'))
            ->first();

        if ($wishlistItem) {
            $wishlistItem->delete();

            return redirect()->back()->with('success', __('whishlistIndex.removeSuccess'));
        }

        return redirect()->back()->with('error', __('whishlistIndex.notFound'));
    }
}
