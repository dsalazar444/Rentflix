<?php

namespace App\Http\Requests;

class ExternalMovieApiResponseRequest
{
    public static function rules(): array
    {
        return [
            'Response' => ['required', 'in:True'],
            'imdbID' => ['required', 'string'],
            'Title' => ['required', 'string'],
            'Director' => ['required', 'string'],
            'Genre' => ['required', 'string'],
            'Poster' => ['required', 'string'],
            'Rated' => ['required', 'string'],
            'Plot' => ['required', 'string'],
            'Year' => ['required'],
        ];
    }
}
