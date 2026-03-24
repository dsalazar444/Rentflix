<?php

// Made by: Laura Andrea Castrillón Fajardo

namespace App\Utils;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    public function store(Request $request, string $idInputFile): string
    {
        if ($request->hasFile($idInputFile)) {
            $file = $request->file($idInputFile);
            $fileName = 'image_'.time().'.'.$file->getClientOriginalExtension();
            Storage::disk('public')->put(
                $fileName,
                file_get_contents($file->getRealPath())
            );

            return $fileName;
        }
        throw new \Exception("No se pudo cargar la imagen: $idInputFile");
    }
}
