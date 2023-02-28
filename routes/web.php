<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\MultiPicController;
use Illuminate\Support\Facades\DB;

use Illuminate\Foundation\Auth\EmailVerificationRequest;


 // email verification 
Route::get('/email/verify', function () {
return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');


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

    //Gallery Route
    Route::get('/gallery', [MultiPicController::class, 'index'])->name('gallery'); 
    Route::post('/images/add', [MultiPicController::class, 'addImage'])->name('store.image'); 


    

  
   
});

