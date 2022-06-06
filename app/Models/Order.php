<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'book_id',
        'count'
    ];

    public function books(){
        return $this->hasMany(Book::class, 'id');
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
