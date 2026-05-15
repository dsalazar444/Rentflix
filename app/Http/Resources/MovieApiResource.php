<?php

//Made by: Samuel Martinez Arteaga

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieApiResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getId(),
            'title' => $this->getTitle(),
            'director' => $this->getDirector(),
            'genre' => $this->getGenre(),
            'quantity_views' => $this->getQuantityViews(),
            'classification' => $this->getClassification(),
            'description' => $this->getDescription(),
            'file_name' => $this->getFileName(),
        ];
    }
}