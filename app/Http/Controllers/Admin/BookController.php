<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('user', 'authors', 'genres', 'media')
            ->when(request('search'), function ($query) {
                $search = request('search');
                $query->where('title', 'LIKE', "%(search)%")
                ->orwhere('authors.name', 'LIKE', "%(search)%");
            })
            ->latest('id')
            ->paginate();


        return view('admin.books.index', compact('books'));
    }
}
