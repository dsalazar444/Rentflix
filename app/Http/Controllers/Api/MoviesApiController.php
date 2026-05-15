<?php

// Made by: Samuel Martinez Arteaga

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieApiResource;
use App\Services\MovieService;
use Illuminate\Http\JsonResponse;

class MoviesApiController extends Controller
{
    public function returnMovies() : JsonResponse
    {
        $movies = MovieApiResource::collection(MovieService::searchMostPopularMoviesLimited(5));
        return response()->json($movies);
    }
}