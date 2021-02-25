<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
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
        Author::updateOrCreate(['name' => 'John Ericson']);
        $book1 = Book::create([
            'user_id' => 1,
            'title' => 'Hakingas',
            'cover' => 'book1.jpg',
            'is_approved' => false,
            'description' => 'Programų kodo narstymo menas',
            'price' => '20',
            'discount' => '0'
        ]);
        $book1->genres()->attach(2);
        $book1->authors()->attach(1);

        Author::updateOrCreate(['name' => 'Stuart McClure']);
        Author::updateOrCreate(['name' => 'Joel Scambray']);
        $book2 = Book::create([
            'user_id' => 1,
            'title' => 'Apsauga nuo Hakerių',
            'cover' => 'book2.jpg',
            'is_approved' => false,
            'description' => 'Tinklo saugumo palaikymas',
            'price' => '30',
            'discount' => '0'
        ]);
        $book2->genres()->attach(2);
        $book2->authors()->attach(2);
        $book2->authors()->attach(3);

        Author::updateOrCreate(['name' => 'Haruki Murakami']);
        $book3 = Book::create([
            'user_id' => 1,
            'title' => 'Kafka pakrantėjė',
            'cover' => 'book3.jpg',
            'is_approved' => true,
            'description' => 'Baltos lankos',
            'price' => '15',
            'discount' => '0'
        ]);
        $book3->genres()->attach(4);
        $book3->authors()->attach(4);

        Author::updateOrCreate(['name' => 'Oleg Surajey']);
        $book4 = Book::create([
            'user_id' => 1,
            'title' => 'Knygą gali parašyti bet kas',
            'cover' => 'book4.jpg',
            'is_approved' => false,
            'description' => 'Aprašymas',
            'price' => '20',
            'discount' => '0'
        ]);
        $book4->genres()->attach(1);
        $book4->authors()->attach(5);

        Author::updateOrCreate(['name' => 'George Orwell']);
        $book5 = Book::create([
            'user_id' => 1,
            'title' => '1984',
            'cover' => 'book5.jpg',
            'is_approved' => true,
            'description' => 'Perskaityk',
            'price' => '27',
            'discount' => '0'
        ]);
        $book5->genres()->attach(2);
        $book5->authors()->attach(6);
    }
}
