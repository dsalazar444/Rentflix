<?php

// Made by: Laura Andrea Castrillon Fajardo

namespace App\Utils;

use Exception;
use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageGCPStorage implements ImageStorage
{
    public function store(Request $request, string $idInputFile): string
    {
        try {
            if (! $request->hasFile($idInputFile)) {
                throw new Exception('No se encontró el archivo de imagen.');
            }
            $file = $request->file($idInputFile);
            $fileName = 'image_' . time() . '.' . $file->getClientOriginalExtension();
            $stored = Storage::disk('gcs')->put(
                $fileName,
                file_get_contents($file->getRealPath())
            );
            if (! $stored) {
                throw new Exception('La subida a GCP no se completó.');
            }

            return $fileName;
        } catch (Exception $e) {
            throw new Exception("Error al cargar la imagen: " . $e->getMessage());
        }
    }
}
