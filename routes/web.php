<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'getUsers');
    Route::get('/user/{id}', 'getUser');
    // Route::get('/users', 'getUsers');
    // Route::get('/users', 'getUsers');
    Route::post('/user/create', 'postUser');
    Route::put('/user/update/{id}', 'putUser');
    Route::delete('/user/delete/{id}', 'deleteUser');;
});

Route::controller(BookController::class)->group(function () {
    Route::get('/books', 'getRents');
    Route::get('/book/{id}', 'getBook');
    // Route::get('/books', 'getRents');
    // Route::get('/books', 'getBooks');
    Route::post('/book/create', 'postBook');
    Route::put('/book/update/{id}', 'putBook');
    Route::delete('/book/delete/{id}', 'deleteBook');
});

Route::controller(RentController::class)->group(function () {
    Route::get('/rents', 'getRents');
    Route::get('/rent/{id}', 'getRent');
    // Route::get('/rents', 'getRents');
    // Route::get('/rents', 'getRents');
    Route::post('/rent/create', 'postRent');
    Route::put('/rent/update/{id}', 'putRent');
    Route::delete('/rent/delete/{id}', 'deleteRent');
});