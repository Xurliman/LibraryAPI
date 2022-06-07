<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            // BookSeeder::class,    
            OrderSeeder::class,
            // StudentSeeder::class
        ]);
    }
}
