<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LibraryItem extends Model
{
    /**
     * LIBRARY ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the library item primary key (id)
     * $this->attributes['user_id'] - int - contains the user id that owns this library item
     * $this->attributes['movie_id'] - int - contains the movie id associated with this library item
     * $this->attributes['created_at'] - timestamp - contains the library item creation timestamp
     * $this->attributes['updated_at'] - timestamp - contains the library item update timestamp
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

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $user_id): void
    {
        $this->attributes['user_id'] = $user_id;
    }

    public function getMovieId(): int
    {
        return $this->attributes['movie_id'];
    }

    public function setMovieId(int $movie_id): void
    {
        $this->attributes['movie_id'] = $movie_id;
    }
}
