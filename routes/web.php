<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
//nj

Route::get('/', function () {
    return view('layouts.app'); // will load resources/views/app.blade.php
});


// Route::get('/', function () {
//     return view(view: 'welcome');
// });

// Route::get('/', [ProductController::class, 'index'])->middleware(['auth']);
// Route::resource('products', ProductController::class)->middleware(['auth']);




// Route::resource('products', ProductController::class)->middleware(['auth']);
require __DIR__.'/auth.php';
