<?php

namespace App\Models;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fakulty extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function groups(){
        return $this->hasMany(Group::class);
    }

    public function students(){
        return $this->hasManyThrough(Student::class, Group::class);
    }
}
