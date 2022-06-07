<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'student_id' => $this->faker->numberBetween(1, 100),
            'book_id' => rand(1, 100),
            'count' => rand(1, 10)
        ];
    }
}
