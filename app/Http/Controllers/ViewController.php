<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Student;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function myBooks(Request $request){
        $user = $request->user();
        $data = Student::where('name', $user->name)->with('books')->first();
        return response(OrderResource::make($data));
    }
}
