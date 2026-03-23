<?php

namespace App\Services;

use App\Models\Movie;
use Illuminate\Support\Collection;

class CartService
{
    public function getSummary(): array
    {
        $shoppingCart = session()->get('cart', []);

        $cartMovieItems = $this->getMovieItems($shoppingCart);
        $cartSubtotal = $cartMovieItems->sum(function (Movie $movie) {
            return $movie->getPrice();
        });

        return [
            'profileInitial' => session()->has('user_id') ? 'C' : 'R',
            'shoppingCart' => $shoppingCart,
            'cartMovieItems' => $cartMovieItems,
            'cartCount' => $cartMovieItems->count(),
            'cartSubtotal' => $cartSubtotal,
        ];
    }

    private function getMovieItems(array $shoppingCart): Collection
    {
        if (empty($shoppingCart)) {
            return collect();
        }

        $cartIds = array_values(array_unique(array_map('intval', $shoppingCart)));
        $orderMap = array_flip($cartIds);

        return Movie::whereIn('id', $cartIds)
            ->get()
            ->sortBy(function (Movie $movie) use ($orderMap) {
                return $orderMap[$movie->getId()] ?? PHP_INT_MAX;
            })
            ->values();
    }

    
}

