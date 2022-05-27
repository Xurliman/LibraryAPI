<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Group;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['group_id', 'book_id', 'name', 'count'];

    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function books(){
        return $this->hasMany(Book::class);
    }
}
