<?php

namespace Database\Factories;

use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    protected $model = Group::class;

    public function definition()
    {
        return [
            'faculty_id' => $this->faker->numberBetween(1, 20),
            'name' => $this->faker->firstName()
        ];
    }
}
