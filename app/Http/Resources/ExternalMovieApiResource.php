<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExternalMovieApiResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this['imdbID'],
            'title' => $this['Title'],
            'director' => $this['Director'],
            'genre' => $this->firstGenre($this['Genre']),
            'file_name' => $this['Poster'],
            'classification' => $this['Rated'],
            'description' => $this['Plot'],
            'year' => (int) $this['Year'],
        ];
    }

    private function firstGenre(string $genre): string
    {
        $parts = explode(',', $genre);
        $firstGenre = trim($parts[0] ?? '');

        return $firstGenre;
    }
}
