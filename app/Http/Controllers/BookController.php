<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $data = Book::all();
        return response($data);
    }

    public function store(BookRequest $request)
    {
        Book::create($request->only([
            'genre',
            'author',
            'title',
            'amount'
        ]));
        return response(['message'=>'Created successfully'], 201);
    }

    public function show(Book $book)
    {
        return response($book->order->books);
    }

    public function update(BookRequest $request, Book $book)
    {
        $book->update($request->only([
            'genre',
            'author',
            'title',
            'amount'
        ]));
        return response(['message'=>'Updated successfully']);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return response(['message'=>'Deleted successfully']);
    }
}
