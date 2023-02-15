<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {

        // eloquent ORM -fetch all users
        $users = User::all();
      
        return view('dashboard',compact('users'));

    })->name('dashboard');


    // Category Controller
    Route::get('/categories', [CategoryController::class, 'index'])->name('category'); 
    Route::post('/categories/add', [CategoryController::class, 'addCat'])->name('store.category'); 
});