<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('landingPage');
})->name('landingPage');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('Content/dashboard', [DashboardController::class, 'index'])->name('Content/dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('Content.dashboard');

    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [UserController::class, 'update'])->name('profile.update');

    Route::get('/all-product', [ProductController::class, 'index'])->name('Content/allProduct');
    Route::get('/search', [ProductController::class, 'search'])->name('products.search');

    Route::get('payment', [ProductController::class, 'payment'])->name('payment');
    Route::post('/sell', [ProductController::class, 'processSell'])->name('product.sell');
    
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

    Route::get('/add-product', function () {
        return view('Content.addProduct');
    })->name('addProduct');

    Route::resource('products', ProductController::class);
    Route::get('/product-log', [ProductController::class, 'medlog'])->name('product.log');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});