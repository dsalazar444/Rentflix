<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\LibraryItem;

class Movie extends Model
{

    /**
     * MOVIE ATTRIBUTES
     * $this->attributes['id'] - int - contains the movie primary key (id)
     * $this->attributes['title'] - string - contains the movie title
     * $this->attributes['director'] - string - contains the movie director name
     * $this->attributes['genre'] - string - contains the movie genre
     * $this->attributes['format'] - string - indicates the movie format (e.g., dvd/digital)
     * $this->attributes['location'] - string - contains the movie storage/location
     * $this->attributes['price'] - int - contains the movie price
     * $this->attributes['quantity'] - int - contains the available movie quantity
     * $this->attributes['quantity_views'] - int - contains the number of times the movie has been viewed
     * $this->attributes['file_name'] - string - contains the movie image path or filename
     * $this->attributes['created_at'] - timestamp - contains the movie creation timestamp
     * $this->attributes['updated_at'] - timestamp - contains the movie update timestamp
     */
    protected $fillable = ['title', 'director', 'genre', 'format', 'location', 'price', 'quantity', 'quantity_views', 'file_name'];

    // public function items(): HasMany
    // {
    //     return $this->hasMany(Item::class);
    // }

    public function libraryItems(): HasMany
    {
        return $this->hasMany(LibraryItem::class);
    }

    // public function wishlistItems(): HasMany
    // {
    //     return $this->hasMany(WishlistItem::class);
    // }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getTitle(): string
    {
        return $this->attributes['title'];
    }

    public function setTitle(string $title): void
    {
        $this->attributes['title'] = $title;
    }

    public function getDirector(): string
    {
        return $this->attributes['director'];
    }

    public function setDirector(string $director): void
    {
        $this->attributes['director'] = $director;
    }

    public function getGenre(): string
    {
        return $this->attributes['genre'];
    }

    public function setGenre(string $genre): void
    {
        $this->attributes['genre'] = $genre;
    }

    public function getFormat(): string
    {
        return $this->attributes['format'];
    }

    public function setFormat(string $format): void
    {
        $this->attributes['format'] = $format;
    }

    public function getLocation(): string
    {
        return $this->attributes['location'];
    }

    public function setLocation(string $location): void
    {
        $this->attributes['location'] = $location;
    }

    public function getPrice(): int
    {
        return (int) $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getQuantity(): int
    {
        return (int) $this->attributes['quantity'];
    }

    public function setQuantity(int $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getQuantityViews(): int
    {
        return (int) $this->attributes['quantity_views'];
    }

    public function setQuantityViews(int $quantity_views): void
    {
        $this->attributes['quantity_views'] = $quantity_views;
    }
}
