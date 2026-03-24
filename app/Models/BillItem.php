<?php

// Made by: Daniela Salazar Amaya

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BillItem extends Model
{
    /*
     * BILL ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the primary key of the bill item
     * $this->attributes['price'] - int - contains the unit price (price per single unit)
     * $this->attributes['quantity'] - int - contains the quantity of this item in the bill
     * $this->attributes['movie_id'] - int - contains the foreign key to the movie
     * $this->attributes['bill_id'] - int - contains the foreign key to the bill
     * $this->attributes['created_at'] - timestamp - contains the creation date
     * $this->attributes['updated_at'] - timestamp - contains the last modification date
     */
    protected $fillable = ['price', 'quantity', 'movie_id'];

    public function bill(): BelongsTo
    {
        return $this->belongsTo(Bill::class)->withDefault();
    }

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class)->withDefault();
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity(int $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getMovieId(): int
    {
        return $this->attributes['movie_id'];
    }

    public function setMovieId(int $movie_id): void
    {
        $this->attributes['movie_id'] = $movie_id;
    }

    public function getBillId(): int
    {
        return $this->attributes['bill_id'];
    }

    public function setBillId(int $bill_id): void
    {
        $this->attributes['bill_id'] = $bill_id;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function getTotalPrice(): int
    {
        return $this->attributes['price'] * $this->attributes['quantity'];
    }
}
