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
            "name" => "Faculty of Mathematics"
        ]);
        $f1 = Faculty::create([
            "name" => "Biology Faculty"
        ]);
        $g1 = Group::create([
            'faculty_id' => $f->id,
            "name" => "3b Mathematics"
        ]);
        $g2 = Group::create([
            'faculty_id' => $f->id,
            "name" => "2d Mathematics"
        ]);
        $g3 = Group::create([
            'faculty_id' => $f1->id,
            "name" => "2d Mathematics"
        ]);

        $s1 = Student::create([
            'group_id' => $g1->id,
            "name" => "Farhan"
        ]);
        $s2 = Student::create([
            'group_id' => $g2->id,
            "name" => "Hyuston"
        ]);
        $s3 = Student::create([
            'group_id' => $g1->id,
            "name" => "Kira"
        ]);
        $s4 = Student::create([
            'group_id' => $g2->id,
            "name" => "Poll"
        ]);
        $s5 = Student::create([
            'group_id' => $g3->id,
            "name" => "Liza"
        ]);
        $s6 = Student::create([
            'group_id' => $g3->id,
            "name" => "Adam"
        ]);
    }
}
