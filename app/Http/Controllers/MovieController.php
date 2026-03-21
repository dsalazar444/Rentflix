<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class MovieController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['movies'] = Movie::all();

        return view('movie.index')->with('viewData', $viewData);
    }
}
