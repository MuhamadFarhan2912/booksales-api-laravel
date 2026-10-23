<?php

namespace App\Http\Controllers;

use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $model = new Author();
        $authors = $model->getAuthors();

        return view('authors', compact('authors'));
    }
}