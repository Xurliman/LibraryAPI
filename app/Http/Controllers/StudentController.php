<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $data = Student::all();
        return response($data);
    }

    public function store(StudentRequest $request)
    {
        Student::create($request->only([
            'group_id',
            'name',
            'has_book' ?? null,
        ]));
        return response(['message'=>'Created successfully'], 201);
    }

    public function show(Student $student)
    {
        $data['student'] = [
            'id' => $student->id,
            'faculty' => $student->group->faculty->name,
            'group' => $student->group->name,
            'name' => $student->name,   
        ];
        foreach ($student->books as $book) {
            $data['student']['books'][] = [
                'id' => $book->id,
                'genre' => $book->genre,
                'author' => $book->author,
                'title' => $book->title,
                'amount'=> $book->amount
            ];
        }
        return response($data);
    }

    public function update(StudentRequest $request, Student $student)
    {
        $student->update($request->only([
            'group_id',
            'name',
            'has_book'
        ]));
        return response(['message'=>'Updated successfully']);
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return response(['message'=>'Deleted successfully']);
    }
}
