<?php

// Made by: Laura Andrea Castrillón Fajardo

namespace App\Services;

use App\Models\Bill;
use App\Models\LibraryItem;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class LibraryItemService
{
    public function notifyMovieSoonToExpire(int $userId): Collection
    {
        $expiringToday = LibraryItem::where('user_id', $userId)
            ->where('created_at', '<=', now()->subDays(24))
            ->with('movie')
            ->get();

        return $expiringToday;
    }

    public function removeMovieExpired(): void
    {
        $expiredItems = LibraryItem::where('created_at', '<', now()->subMonth())
            ->with('movie')
            ->get();

        foreach ($expiredItems as $item) {
            if ($item->movie->getFormat() === 'DVD') {
                $item->movie->increment('quantity', 1);
            }
        }

        LibraryItem::where('created_at', '<', now()->subMonth())->delete();
    }

    public function synchLibraryAfterPurchase(Bill $bill): void
    {
        try {
            // Add purchased movies to user's library
            foreach ($bill->items as $billItem) {
                LibraryItem::firstOrCreate(
                    [
                        'user_id' => $bill->user_id,
                        'movie_id' => $billItem->movie_id,
                    ]
                );
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
}
