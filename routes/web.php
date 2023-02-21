<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;

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
    Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']); 
    Route::post('/category/update/{id}', [CategoryController::class, 'Update']);
    Route::get('/softdelete/category/{id}',[CategoryController::class, 'softDelete']);
    Route::get('/restore/category/{id}',[CategoryController::class, 'Restore']);
    Route::get('/clean-delete/category/{id}',[CategoryController::class, 'cleanDelete']);

    
    //Brands
    Route::get('/brands', [BrandController::class, 'index'])->name('brands'); 
    // store.brand
    Route::post('/brands/add', [BrandController::class, 'addBrand'])->name('store.brand'); 
    Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']); 
    Route::post('/brand/update/{id}', [BrandController::class, 'Update']);
    Route::get('/brand/delete/{id}',[BrandController::class, 'Delete']);

    

});