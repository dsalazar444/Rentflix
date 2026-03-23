<?php

// Autora: Daniela Salazar

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// models are PHP classes that represent and interact with your database tables using the built-in Eloquent ORM.

class BillItem extends Model
{
    /*
     * BILL ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the primary key of the bill item
     * $this->attributes['price'] - int - contains the price of the item
     * $this->attributes['quantity'] - int - contains the quantity of this item in the bill
     * $this->attributes['movie_id'] - int - contains the foreign key to the movie
     * $this->attributes['bill_id'] - int - contains the foreign key to the bill
     * $this->attributes['created_at'] - timestamp - contains the creation date
     * $this->attributes['updated_at'] - timestamp - contains the last modification date
     */

    protected $fillable = ['price', 'quantity', 'user_id', 'movie_id'];

    // relationships

    public function bill(): BelongsTo
    {
        return $this->belongsTo(Bill::class)->withDefault();
    }

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class)->withDefault();
    }

    // getters y setters

    public function getId(): int
    {
        return $this->attributes['id'];
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
}
