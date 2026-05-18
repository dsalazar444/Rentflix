<?php

// Made by: Daniela Salazar Amaya

namespace App\Services\Api;

use Exception;
use Illuminate\Support\Facades\Http;

class VenekaApiService
{
    public function getProducts(): array
    {
        try {
            $response = Http::get('http://34.68.27.58/api/products');

            if ($response->successful()) {
                $payload = $response->json('data');

                return $payload ?? [];
            }

            return [];
        } catch (Exception $e) {
            return [];
        }
    }
}
