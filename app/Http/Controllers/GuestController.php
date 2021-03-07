<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Genre;

class GuestController extends Controller
{
    public function index()
    {
        $books = Book::with('authors', 'genres', 'media')
        ->when(request('search'), function ($query) {
            $search = request('search');
            $query->where('title', 'LIKE', "%(search)%")
            ->orwhere('authors.name', 'LIKE', "%(search)%");
        })
        ->approved()
        ->latest()
        ->paginate();

        $genres = Genre::all();

        return view('welcome', compact('books', 'genres'));
    }

    public function show($id)
    {
        return view('showbook');
    }
}
