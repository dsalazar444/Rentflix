<?php

// Made by: Laura Andrea Castrillon Fajardo

namespace App\Utils;

use App\Interfaces\ImageStorage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageGCPStorage implements ImageStorage
{
    public function store(Request $request, string $idInputFile): string
    {
        try {
            $request->hasFile($idInputFile);
            $file = $request->file($idInputFile);
            $fileName = 'image_'.time().'.'.$file->getClientOriginalExtension();
            $stored = Storage::disk('gcs')->put(
                $fileName,
                file_get_contents($file->getRealPath())
            );

            if (! $stored) {
                throw new Exception('The upgrade to GCP was not completed.');
            }

            $bucket = config('filesystems.disks.gcs.bucket');
            $fileUrl = "https://storage.googleapis.com/{$bucket}/{$fileName}";

            return $fileUrl;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function delete(string $fileIdentifier): bool
    {
        try {
            return Storage::disk('gcs')->delete($fileIdentifier);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
