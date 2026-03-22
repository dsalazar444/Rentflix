<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Interfaces\ImageStorage;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
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
            'description',
            'classification',
            'trailer_link',
            'year',
            'location',
        ]) + ['file_name' => $imageName]);

        return redirect()->route('admin.movie.index');
    }

    public function delete(string $id): RedirectResponse
    {
        $movie = Movie::find($id);
        if (! $movie) {

            return redirect()->route('admin.movie.index');
        }
        $movie->delete();

        return redirect()->route('admin.movie.index');
    }

    public function update(UpdateMovieRequest $request, string $id): RedirectResponse
    {
        $movie = Movie::find($id);
        if (!$movie) {
            return redirect()->route('admin.movie.index');
        }

        $data = $request->only([
            'title',
            'director',
            'genre',
            'format',
            'price',
            'quantity',
            'description',
            'classification',
            'trailer_link',
            'year',
            'location',
        ]);

        if ($request->hasFile('movie_image')) {
            $imageName = $this->imageStorage->store($request, 'movie_image');
            $data['file_name'] = $imageName;
        }

        $movie->update($data);

        return redirect()->route('admin.movie.index');
    }
}
