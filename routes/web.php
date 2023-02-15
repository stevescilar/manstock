<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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
});

// Route::middleware(['auth:sanctum','verified']) ->get('/dashboard', function () {

//     $users = User::all();
      
//     return view('dashboard',compact('users'));
// })->name('dashboard');