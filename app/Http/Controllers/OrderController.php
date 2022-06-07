<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Jobs\CreateOrderJob;
use App\Jobs\GiveBookJob;
use App\Jobs\ReturnBookJob;
use App\Models\Order;
use App\Models\Student;

class OrderController extends Controller
{
    public function index()
    {
        $students = Student::has('orders')->with('orders')->with('books')->paginate();
        return OrderResource::collection($students);
    }

    public function giveBook(OrderRequest $request, Student $student)
    {
        $requestedBooks = $request->books;
        $orders = $student->orders;
        foreach ($requestedBooks as $book) {
            $order = collect($orders)->where('book_id', $book['book_id'])->first();
            if ($order) {
                $targetBook = $student->books->where('id', $order->book_id)->first();
                $requestedCount = $book['count'];
                if ($requestedCount > $targetBook->amount) {
                    return response(['message' => 'The amount of book is insufficient']);
                }else {
                    $count = $requestedCount + $order->count;
                    $order->update(['count' => $count]);
                    $amount = $targetBook->amount - $requestedCount;
                    $targetBook->update(['amount' => $amount]);
                    $order->student()->update(['has_book' => 1]);
                }
            }else {
                $student->orders()->create($book);
            }  
        }
        return response(['message'=>'successfull'], 201);
    }

    public function show(Order $order)
    {
        return response($order);
    }

    public function update(OrderRequest $request, Order $order)
    {
        $order->update($request->only([
            'student_id',
            'book_id',
            'count'
        ]));
        return response(['message'=>'Updated successfully']);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return response(['message'=>'Deleted successfully']);
    }

    public function returnBook(OrderRequest $request, Student $student)
    {
        $requestedBooks = $request->books;
        $orders = $student->orders;
        foreach ($requestedBooks as $book) {
            $order = collect($orders)->where('book_id', $book['book_id'])->first();
            if (!$order) {
                return response(['message' => 'Error'], 404);
            }
            $targetBook = $student->books->where('id', $order->book_id)->first();
            $num = $order->count - $book['count'];
            if ($num == 0) {
                $order->delete();
                $student->update(['has_book' => 0]);
            }else {
                $count = $order->count - $book['count'];
                $amount = $targetBook->amount + $book['count'];
                $order->update(['count' => $count]);
                $targetBook->update(['amount' => $amount]);
            }
        }
        return response(['message'=>'successfull'], 201);
    }
}
