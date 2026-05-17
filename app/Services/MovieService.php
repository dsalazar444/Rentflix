<?php

// Made by: Laura Andrea Castrillón Fajardo

namespace App\Services;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

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

    public static function searchMostPopularMoviesLimited(int $limit): Collection
    {
        if ($limit <= 0) {
            $movies = Movie::orderBy('quantity_views', 'desc')->get();

            return $movies;
        }
        $movies = Movie::orderBy('quantity_views', 'desc')->take($limit)->get();

        return $movies;
    }

    public static function searchMovieExternalApi(string $title): array
    {
        $movieResponse = Http::get('https://www.omdbapi.com/', [
            'apikey' => env('OMDB_API_KEY'),
            't' => $title,
        ])->json();

        return $movieResponse;
}

    static public function getMovies(Request $request): Collection
    {
        $selectedGenre = $request->query('genre', 'all');
        $selectedSort = $request->query('sort', 'priceAsc');

        $moviesQuery = Movie::query();

        if ($selectedGenre !== 'all') {
            $moviesQuery->where('genre', $selectedGenre);
        }

        if ($selectedSort === 'priceDesc') {
            $moviesQuery->orderBy('price', 'desc');
        } elseif ($selectedSort === 'available') {
            $moviesQuery->where('quantity', '>', 0);
            $moviesQuery->orderBy('title', 'asc');
        } else {
            $moviesQuery->orderBy('price', 'asc');
        }

        $movies = $moviesQuery->get();
        return $movies;
    }
}
