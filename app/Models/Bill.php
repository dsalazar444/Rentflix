<?php

// # Autora: Daniela Salazar

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// models are PHP classes that represent and interact with your database tables using the built-in Eloquent ORM.

class Bill extends Model
{
    use HasFactory;
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
        return $this->hasMany(BillItem::class)->chaperone();
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

    public function getIdFormatted(): string
    {
        return str_pad($this->attributes['id'], 6, '0', STR_PAD_LEFT);
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

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getCreatedAtFormatted(): string
    {
        return $this->created_at->format('d-m-Y');
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
