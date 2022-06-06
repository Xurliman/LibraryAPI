<?php

namespace App\Http\Controllers;

use App\Http\Requests\FacultyRequest;
use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index()
    {
        $data = Faculty::all();
        return response($data);
    }

    public function store(FacultyRequest $request)
    {
        Faculty::create($request->only(
            'name'
        ));
        return response(['message'=>'Created successfully'], 201);
    }

    public function show(Faculty $faculty)
    {
        return response($faculty);
    }

    public function update(FacultyRequest $request, Faculty $faculty)
    {
        $faculty->update($request->only([
            'name'
        ]));
        return response(['message'=>'Updated successfully']);
    }

    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
        return response(['message'=>'Deleted successfully']);
    }
}
