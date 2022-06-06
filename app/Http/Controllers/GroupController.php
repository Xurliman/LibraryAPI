<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $data = Group::all();
        return response($data);
    }

    public function store(GroupRequest $request)
    {   
        Group::create($request->only([
            'faculty_id',
            'name'
        ]));
        return response(['message'=>'Created successfully'], 201);
    }

    public function show(Group $group)
    {
        return response($group);
    }

    public function update(GroupRequest $request, Group $group)
    {
        $group->update($request->only([
            'faculty_id',
            'name'
        ]));
        return response(['message'=>'Updated successfully']);
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return response(['message'=>'Deleted successfully']);
    }
}
