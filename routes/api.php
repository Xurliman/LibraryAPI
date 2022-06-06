<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'faculties' => FacultyController::class,
    'groups' => GroupController::class,
    'students' => StudentController::class,
    'books' => BookController::class,
]);
Route::resource('orders', OrderController::class, [
    'index', 'show', 'update', 'delete'
]);
Route::post('/give/books/{student}', [OrderController::class, 'giveBook']);
Route::post('/return/books/{student}', [OrderController::class, 'returnBook']);