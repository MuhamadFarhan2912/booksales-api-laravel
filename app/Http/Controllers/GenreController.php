<?php

namespace App\Http\Controllers;

use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $model = new Genre();
        $genres = $model->getGenres();

        return view('genres', compact('genres'));
    }
}