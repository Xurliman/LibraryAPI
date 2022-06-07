<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum']], function(){

    // student should view:
    Route::group(['middleware' => 'student'], function(){
        Route::get('/my/books', [ViewController::class, 'myBooks']);
        Route::post('/user', [AuthController::class, 'getme']);
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });

    // librarian should view:
    Route::group(['middleware' => 'librarian'], function(){
        Route::post('/give/books/{student}', [OrderController::class, 'giveBook']);
        Route::post('/return/books/{student}', [OrderController::class, 'returnBook']);
        Route::resource('orders', OrderController::class, [
            'index', 'show', 'update', 'delete'
        ]);
        Route::post('/user', [AuthController::class, 'getme']);
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });

    // admin should view:
    Route::group(['middleware' => 'admin'], function(){
        Route::apiResources([
            'faculties' => FacultyController::class,
            'groups' => GroupController::class,
            'students' => StudentController::class,
            'books' => BookController::class,
        ]);
        Route::post('/user', [AuthController::class, 'getme']);
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});
