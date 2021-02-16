<?php

namespace App\Http\Controllers\User;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Models\Author;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$books = auth()->user()->books()->latest('id')->paginate(25);

        //$books = Book::with('authors', 'genres')->latest('id')->approved()->paginate();
        $books = Book::with('authors', 'genres')
            ->when(request('search'), function ($query) {
                $search = request('search');
                $query->where('title', 'LIKE', "%(search)%")
                ->orwhere('authors.name', 'LIKE', "%(search)%");
            })
            ->latest('id')
            ->paginate();

        return view('user.books.index', compact('books'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();

        return view('user.books.create', compact('genres'));
        //return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $book = auth()->user()->books()->create($request->validated());

        $book->genres()->attach($request->input('genres'));

        $authors = explode(",", $request->input('authors'));

        foreach ($authors as $authorName) {
            $author = Author::updateOrCreate(['name' =>$authorName]);
            $book->authors()->attach($author->id);
        }

        return redirect()->route('user.books.index')
            ->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('user.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('user.books.edit', compact('book'));
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
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'cover' => 'required',
            'price' => 'required'
        ]);

        $book->update($request->all());

        return redirect()->route('user.books.index')
            ->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('user.books.index')
            ->with('success', 'Book deleted successfully');
    }
}
