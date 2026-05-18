<?php

// Made by: Samuel Martínez Arteaga

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Movie;
use App\Services\MovieService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MovieServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    use RefreshDatabase;

    public function test_returns_all_movies_when_limit_is_zero()
    {
        // Arrange
        Movie::factory()->count(5)->create();

        // Act
        $movies = MovieService::searchMostPopularMoviesLimited(0);

        // Assert
        $this->assertCount(5, $movies);
    }

    public function test_returns_only_limited_movies()
    {
        // Arrange
        Movie::factory()->count(10)->create();

        // Act
        $movies = MovieService::searchMostPopularMoviesLimited(3);

        // Assert
        $this->assertCount(3, $movies);
    }
}
