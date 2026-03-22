<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Interfaces\ImageStorage;
use App\Http\Requests\StoreMovieRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class MovieController extends Controller
{
    private ImageStorage $imageStorage;

    public function __construct()
    {
        $this->imageStorage = app(ImageStorage::class);
    }

    public function index(): View
    {
        $viewData = [];
        $viewData['movies'] = Movie::all();

        return view('admin.movie.index')->with('viewData', $viewData);
    }

    public function save(StoreMovieRequest $request): RedirectResponse
    {
        $imageName = $this->imageStorage->store($request, 'movie_image');

        Movie::create($request->only([
            'title',
            'director',
            'genre',
            'format',
            'price',
            'quantity',
            'trailer_link',
            'location',
        ]) + ['file_name' => $imageName]);

        return redirect()->route('admin.movie.index');
    }
}
