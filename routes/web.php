<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'index'])->name('public.home');
Route::get('/fragrances', [PublicController::class, 'fragrances'])->name('public.fragrances');
Route::get('/cart', [PublicController::class, 'cart'])->name('public.cart');
Route::post('/cart/add/{id}', [PublicController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update/{id}', [PublicController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove/{id}', [PublicController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/checkout', [PublicController::class, 'checkout'])->name('cart.checkout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'admin'])->name('dashboard');

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__.'/auth.php';
