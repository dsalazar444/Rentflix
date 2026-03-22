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

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $userId): void
    {
        $this->attributes['user_id'] = $userId;
    }

    public function getMovieId(): int
    {
        return $this->attributes['movie_id'];
    }

    public function setMovieId(int $movieId): void
    {
        $this->attributes['movie_id'] = $movieId;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->attributes['created_at'] ?? null;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->attributes['updated_at'] ?? null;
    }

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }
}
