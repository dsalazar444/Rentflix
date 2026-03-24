<?php

// Made by: Laura Andrea Castrillón Fajardo

namespace App\Interfaces;

use Illuminate\Http\Request;

interface ImageStorage
{
    public function store(Request $request, string $idInputFile): string;
}
