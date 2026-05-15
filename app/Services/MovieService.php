<?php

// Made by: Laura Andrea Castrillón Fajardo

namespace App\Services;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Collection;

class MovieService
{
    public function searchMovieByName(string $query): array
    {
        $movies = collect();
        $notFound = false;

        if ($query) {
            $movies = Movie::whereRaw('LOWER(title) LIKE ?', ['%'.strtolower($query).'%'])->get();
            $notFound = $movies->isEmpty();
        }

        return [
            'movies' => $movies,
            'notFound' => $notFound,
        ];
    }

    static public function searchMostPopularMoviesLimited(int $limit): Collection
    {
        if ($limit <= 0) {
            $movies = Movie::orderBy('quantity_views', 'desc')->get();
            return $movies;
        }
        $movies = Movie::orderBy('quantity_views', 'desc')->take($limit)->get();
        return $movies;
    }
}
