<?php

// Made by: Laura Andrea Castrillón Fajardo

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Interfaces\ImageStorage;
use App\Models\Movie;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MovieManagmentController extends Controller
{
    private ImageStorage $imageStorage;

    public function index(): View
    {
        $viewData = [];
        $viewData['movies'] = Movie::all();

        return view('admin.movie.index')->with('viewData', $viewData);
    }

    public function save(StoreMovieRequest $request): RedirectResponse
    {
        $storage = $request->get('storage', 'gcp');
        $imageStorage = app(ImageStorage::class, ['storage' => $storage]);
        $imageName = $imageStorage->store($request, 'movie_image');
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

        return redirect()->route('admin.movie.index')
            ->with('success', __('adminMovieIndex.statusModal.save.success'));
    }

    public function delete(string $id): RedirectResponse
    {
        $movie = Movie::find($id);
        if (! $movie) {

            return redirect()->route('admin.movie.index')
                ->with('error', __('adminMovieIndex.statusModal.notFound.error'));
        }
        $movie->delete();

        return redirect()->route('admin.movie.index')
            ->with('success', __('adminMovieIndex.statusModal.delete.success'));
    }

    public function update(UpdateMovieRequest $request, string $id): RedirectResponse
    {
        $movie = Movie::find($id);
        if (! $movie) {
            return redirect()->route('admin.movie.index')->with('error', __('adminMovieIndex.statusModal.notFound.error'));
        }

        $updatedMovieData = $request->only([
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
            $storage = $request->get('storage', 'gcp');
            $imageStorage = app(ImageStorage::class, ['storage' => $storage]);
            $imageName = $imageStorage->store($request, 'movie_image');
            $updatedMovieData['file_name'] = $imageName;
        }

        $movie->update($updatedMovieData);

        return redirect()->route('admin.movie.index')->with('success', __('adminMovieIndex.statusModal.update.success'));
    }
}
