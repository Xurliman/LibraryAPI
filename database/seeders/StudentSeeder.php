<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Faculty;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $f = Faculty::create([
            "name" => "Faculty of English Language"
        ]);
        $f1 = Faculty::create([
            "name" => "Economics Faculty"
        ]);
        $g1 = Group::create([
            'faculty_id' => $f->id,
            "name" => "3b English"
        ]);
        $g2 = Group::create([
            'faculty_id' => $f->id,
            "name" => "2d English"
        ]);
        $g3 = Group::create([
            'faculty_id' => $f1->id,
            "name" => "2d English"
        ]);

        $s1 = Student::create([
            'group_id' => $g1->id,
            "name" => "Fillip"
        ]);
        $s2 = Student::create([
            'group_id' => $g2->id,
            "name" => "Lorens"
        ]);
        $s3 = Student::create([
            'group_id' => $g1->id,
            "name" => "Klara"
        ]);
        $s4 = Student::create([
            'group_id' => $g2->id,
            "name" => "Fillip"
        ]);
        $s5 = Student::create([
            'group_id' => $g3->id,
            "name" => "Lorens"
        ]);
        $s6 = Student::create([
            'group_id' => $g3->id,
            "name" => "Klara"
        ]);
    }
}
