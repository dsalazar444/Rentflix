<?php

// Made by: Laura Andrea Castrillón Fajardo

namespace App\Utils;

use App\Interfaces\ImageStorage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    public function store(Request $request, string $idInputFile): string
    {
        try {
            $request->hasFile($idInputFile);
            $file = $request->file($idInputFile);
            $fileName = 'image_'.time().'.'.$file->getClientOriginalExtension();
            Storage::disk('public')->put(
                $fileName,
                file_get_contents($file->getRealPath())
            );

            return $fileName;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function delete(string $fileIdentifier): bool
    {
        try {
            return Storage::disk('public')->delete($fileIdentifier);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
