<?php

// Made by: Daniela Salazar

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

// models are PHP classes that represent and interact with your database tables using the built-in Eloquent ORM.

class Bill extends Model
{
    /*
     * BILL ATTRIBUTES
     * $this->attributes['id'] - int - contains the bill primary key (id)
     * $this->attributes['price'] - int - contains the bill price
     * $this->attributes['address'] - string - contains the billing address (where the movie will be sent)
     * $this->attributes['user_id'] - int - contains the foreign key to the user
     * $this->attributes['created_at'] - timestamp - contains the date it was created
     * $this->attributes['updated_at'] - timestamp - contains the date it was last modified
     */

    public function items(): HasMany
    {
        return $this->hasMany(BillItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    protected $fillable = ['price', 'address', 'user_id'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getIdWithNumeral(): string
    {
        return '#'.$this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getAddress(): string
    {
        return $this->attributes['address'];
    }

    public function setAddress(string $address): void
    {
        $this->attributes['address'] = $address;
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $user_id): void
    {
        $this->attributes['user_id'] = $user_id;
    }

    public function getUserFirstName(): string
    {
        if ($this->user && $this->user->name) {
            return explode(' ', trim($this->user->name))[0];
        }

        return '';
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getCreatedAtWithFormat(): string
    {
        return $this->created_at ? $this->created_at->format('M d, Y') : '';
    }

    public function setCreatedAt($created_at)
    {
        $this->attributes['created_at'] = $created_at;
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updated_at)
    {
        $this->attributes['updated_at'] = $updated_at;
    }

    public function getItems(): Collection
    {
        if (! $this->relationLoaded('items')) {
            $this->load('items.movie');
        }

        return $this->items;
    }

    // Synchronizes bill items: updates existing items and deletes those not in the provided list
    public function syncItems($items): void
    {
        $requestItemIds = collect($items ?? [])->pluck('id')->filter()->map(fn ($id) => (int) $id)->toArray();

        $this->items()->whereNotIn('id', $requestItemIds)->delete();

        foreach ($items as $itemData) {
            $item = $this->items()->where('id', $itemData['id'])->first();
            if ($item) {
                $item->quantity = $itemData['quantity'];
                $item->save();
            }
        }
    }

    // Creates a new bill with its associated items in a single transaction
    public static function createWithItems(array $billData, array $items): self
    {
        try {
            $bill = self::create($billData);

            if ($items) {
                foreach ($items as $index => $itemData) {
                    $createdItem = $bill->items()->create([
                        'movie_id' => $itemData['movie_id'],
                        'quantity' => $itemData['quantity'],
                        'price' => $itemData['price'],
                    ]);
                }
            }
            
            // Double-check what's in DB
            $checkCount = \App\Models\BillItem::where('bill_id', $bill->id)->count();

            return $bill;
        } catch (Exception $e) {
            throw $e;
        }
    }
}