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
            'genre' => $this['Genre'],
            'file_name' => $this['Poster'],
            'classification' => $this['Rated'],
            'description' => $this['Plot'],
            'trailer_link' => null,
            'year' => (int) $this['Year'],
        ];
    }
}
