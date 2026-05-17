<?php

// Made by: Laura Andrea Castrillón Fajardo

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchMovieExternalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
        ];
    }
}
