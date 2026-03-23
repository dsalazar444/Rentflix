<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class UpdateMovieRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'director' => 'required|string',
            'genre' => 'required|in:accion,aventuras,animacion,comedia,drama,fantasia,terror,ciencia ficcion',
            'classification' => 'required|string',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'format' => 'required|in:DVD,digital',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'movie_image' => 'nullable|image|mimes:jpeg,png,jpg',
            'description' => 'required|string',
            'trailer_link' => 'required|url',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        session(['lastForm' => 'formEdit']);
        parent::failedValidation($validator);
    }
}
