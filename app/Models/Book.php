<?php

namespace App\Models;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['genre_id', 'author_id', 'name'];

    public function genres(){
        return $this->hasMany(Genre::class);
    }

    public function authors(){
        return $this->hasMany(Author::class);
    }

    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }
}
