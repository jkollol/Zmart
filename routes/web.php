<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\StripeController;
use App\Http\Controllers\StripePaymentController;

Route::get('/checkout', [StripePaymentController::class, 'checkout'])->name('checkout');
Route::get('/payment-success', [StripePaymentController::class, 'success'])->name('payment.success');
Route::get('/payment-cancel', [StripePaymentController::class, 'cancel'])->name('payment.cancel');


Route::post('/checkout', [StripeController::class, 'checkout'])->name('checkout');
Route::get('/checkout/success', [StripeController::class, 'success'])->name('checkout.success');
Route::get('/checkout/cancel', [StripeController::class, 'cancel'])->name('checkout.cancel');





Route::get('/', [WelcomeController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/menu', [MenuController::class, 'index'])->name('menu');


Route::resource('products', controller: ProductController::class);
Route::get('/details/{id}', [ProductController::class, 'show'])->name('product.details');


Route::get('/bkroy', [ProductController::class, 'bkroy'])->name('products.bkroy');
Route::post('/bkroy', [ProductController::class, 'store'])->name('products.store');

Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->middleware('auth')->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
