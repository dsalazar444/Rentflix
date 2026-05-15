<?php

// Made by: Laura Andrea Castrillón Fajardo

namespace App\Services;

use App\Models\Movie;

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
}
