<?php

// Made by: Laura Andrea Castrillón Fajardo

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchMovieExternalRequest;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Http\Resources\ExternalMovieApiResource;
use App\Interfaces\ImageStorage;
use App\Models\Movie;
use App\Services\MovieService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MovieManagmentController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['movies'] = Movie::all();

        return view('admin.movie.index')->with('viewData', $viewData);
    }

    public function save(StoreMovieRequest $request): RedirectResponse
    {
        $imageName = $request->resolvedImageName();

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

        if ($movie->file_name) {
            try {
                $imageStorage = app(ImageStorage::class, ['storage' => 'gcp']);
                $imageStorage->delete($movie->file_name);
            } catch (Exception $e) {
                throw $e;
            }
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
            $storage = $request->input('storage', 'gcp');
            $imageStorage = app(ImageStorage::class, ['storage' => $storage]);
            $imageName = $imageStorage->store($request, 'movie_image');
            $updatedMovieData['file_name'] = $imageName;
        }

        $movie->update($updatedMovieData);

        return redirect()->route('admin.movie.index')->with('success', __('adminMovieIndex.statusModal.update.success'));
    }

    public function create(): View
    {
        return view('admin.movie.create');
    }

    public function getMovieDataFromExternalApi(SearchMovieExternalRequest $request): View|RedirectResponse
    {
        $title = $request->input('title');
        $movieApiData = MovieService::searchMovieExternalApi($title);

        if ($movieApiData['Response'] === 'False') {
            return redirect()->route('admin.movie.create')->with('error', __('adminMovieModalCreate.movieNotFound'));
        }

        $movie = ExternalMovieApiResource::make($movieApiData)->resolve();
        $viewData = [];
        $viewData['movie'] = $movie;

        return view('admin.movie.create')->with('viewData', $viewData);
    }
}
