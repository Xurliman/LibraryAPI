<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'genre' => $this->faker->word(),
            'author' => $this->faker->name(),
            'title' => $this->faker->sentence(),
            'amount' => rand(90, 900)
        ];
    }
}
