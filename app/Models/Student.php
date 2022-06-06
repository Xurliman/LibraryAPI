<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'name',
        'has_book'
    ];

    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function books(){
        return $this->hasManyThrough(Book::class, Order::class, 'student_id', 'id', 'id', 'book_id');
    }
}
// faculty=>groups=>students
// students=>orders=>books
