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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->update(['is_approved' => true]);

        return redirect()->route('admin.books.index')
            ->with('success', 'Book approved successfully');
    }
}
