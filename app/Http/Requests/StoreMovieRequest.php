<?php

// Made by: Laura Andrea Castrillón Fajardo

namespace App\Http\Requests;

use App\Interfaces\ImageStorage;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'genre' => 'required|string',
            'classification' => 'required|string',
            'year' => 'required|integer|min:1900|max:'.date('Y'),
            'format' => 'required|in:DVD,digital',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'movie_image' => 'nullable|image|mimes:jpeg,png,jpg',
            'file_name' => 'required|string',
            'description' => 'required|string',
            'trailer_link' => 'required|url',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        session(['lastForm' => 'movieForm']);
        parent::failedValidation($validator);
    }

    public function resolvedImageName(): string
    {
        $imageName = $this->input('file_name');

        if ($this->hasFile('movie_image')) {
            $storage = $this->get('storage', 'gcp');
            $imageStorage = app(ImageStorage::class, ['storage' => $storage]);
            $imageName = $imageStorage->store($this, 'movie_image');
        }

        return $imageName;
    }
}
