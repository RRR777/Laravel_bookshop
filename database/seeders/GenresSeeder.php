<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::create(['name' => 'Adventures']);
        Genre::create(['name' => 'Classics']);
        Genre::create(['name' => 'Detectives']);
        Genre::create(['name' => 'Romance']);

        Genre::factory()->count(10)->create();
    }
}
