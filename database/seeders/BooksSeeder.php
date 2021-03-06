<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = Book::factory()->count(26)->create();

        foreach ($books as $book) {
            $numberOfGenres = rand(1, 2);
            $genres = [];

            for ($i=0; $i < $numberOfGenres; $i++) {
                $id = rand(1, 10);
                $genre = Genre::where('id', $id)->first();
                array_push($genres, $genre->id);
            }

            $book->genres()->attach($genres);

            $numberOfAuthors = rand(1, 3);

            for ($i=0; $i < $numberOfAuthors; $i++) {
                $id = rand(1, 100);
                $author = Author::where('id', $id)->first();
                $book->authors()->attach($author->id);
            }
        }
    }
}
