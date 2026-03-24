<?php

// Made by: Daniela Salazar Amaya

namespace App\Models;

use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Response;

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
    protected $fillable = ['price', 'address', 'user_id'];

    public function items(): HasMany
    {
        return $this->hasMany(BillItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getIdWithNumeral(): string
    {
        return '#'.$this->attributes['id'];
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
        if ($this->user && $this->user->getName()) {
            return explode(' ', trim($this->user->getName()))[0];
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

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function getItems(): Collection
    {
        if (! $this->relationLoaded('items')) {
            $this->load('items.movie');
        }

        return $this->items;
    }

    public function calculateTotalPrice(): int
    {
        return $this->items->sum(function ($item) {
            return $item->getPrice() * $item->getQuantity();
        });
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

            return $bill;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function generatePdf(): Response
    {
        if (! $this->relationLoaded('items')) {
            $this->load('items.movie');
        }

        $pdf = Pdf::loadView('bill.pdf', ['bill' => $this]);

        return $pdf->download('factura_id_'.$this->id.'.pdf');
    }
}
