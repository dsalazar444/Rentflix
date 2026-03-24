<?php

// Made by: Laura Andrea Castrillón Fajardo

namespace App\Services;

use App\Models\LibraryItem;
use Illuminate\Database\Eloquent\Collection;

class LibraryItemService
{
    public function notify(int $userId): Collection
    {
        $expiringToday = LibraryItem::where('user_id', $userId)
            ->where('created_at', '<=', now()->subDays(24))
            ->with('movie')
            ->get();

        return $expiringToday;
    }

    public function removeExpired(): void
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
}
