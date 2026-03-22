<?php

/** Made by: Samuel Martínez Arteaga */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WishlistItem extends Model
{
    use HasFactory;

    /**
     * Wishlist ATTRIBUTES
     * $this->attributes['id'] - int - contains the Wishlist primary key (id)
     * $this->attributes['user_id'] - int - contains the user ID
     * $this->attributes['movie_id'] - int - contains the movie ID
     * $this->attributes['created_at'] - datetime - contains the Wishlist creation timestamp
     * $this->attributes['updated_at'] - datetime - contains the Wishlist update timestamp
     */
    protected $fillable = ['user_id', 'movie_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }
}
