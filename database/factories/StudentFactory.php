<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;
    
    public function definition()
    {
        return [
            'group_id' => $this->faker->numberBetween(1, 50),
            'name' => $this->faker->name()
        ];
    }
}
