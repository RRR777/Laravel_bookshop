<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BooksTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_homepage_contains_empty_books_table()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSee('No books found');
    }

    public function test_homepage_contains_non_empty_books_table()
    {
        $genre = Genre::create(['name' => 'Adventures']);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee($genre->name);

        // $response->assertDontSee('I No books found');
    }

    public function test_homepage_received_data()
    {
        $genre = Genre::create(['name' => 'Adventures']);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee($genre->name);

        $viewGenres = $response->viewData('genres');

        $this->assertEquals($genre->name, $viewGenres->first()->name);

        // $response->assertDontSee('I No books found');
    }

    // public function test_paginated_books_table_doesnt_show_26th_record()
    // {
    //     $users = User::factory()->count(5)->create();
    //     $genres = Genre::factory()->count(4)->create();

    //     $books = Book::factory()->count(26)->create();

    //     info($books);

    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    //     $response->assertDontSee($books->last()->title);

    //     // $viewGenres = $response->viewData('genres');

    //     // $this->assertEquals($genre->name, $viewGenres->first()->name);

    //     // $response->assertDontSee('I No books found');
    // }
}
