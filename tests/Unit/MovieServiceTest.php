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
        Movie::factory()->count(10)->create();

        $movies = MovieService::searchMostPopularMoviesLimited(3);

        $this->assertCount(3, $movies);
    }

    public function test_returns_movie_data_information_from_external_api()
    {
        $titleMovie = 'Cars';

        $movieData = MovieService::searchMovieExternalApi($titleMovie);

        $this->assertIsArray($movieData);
        $this->assertArrayHasKey('Response', $movieData);
        
        if ($movieData['Response'] === 'True') {
            $this->assertArrayHasKey('Title', $movieData);
            $this->assertArrayHasKey('Year', $movieData);
            $this->assertArrayHasKey('imdbID', $movieData);
            $this->assertNotEmpty($movieData['Title']);
        }
    }
}
