<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween($min = 1, $max = 5),
            'title' => $this->faker->name,
            'description' => $this->faker->realText,
            'cover' => $this->faker->image($dir = '/tmp', $width = 217, $height = 384), // '/tmp/13b73edae8443990be1aa8f1a483bc27.jpg'
            'price' => $this->faker->numberBetween($min = 5, $max = 99),
            'discount' => $this->faker->numberBetween($min = 5, $max = 30),
            'approved_at' => now()
        ];
    }
}
