<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OTPController;
//////////////////////////////////////////////////////////////////////
use App\Http\Controllers\ProductController;
//////////////////////////////////////////////////////////////////////
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\MedlogController;
use App\Http\Controllers\Admin\ProfileAdminController;
//////////////////////////////////////////////////////////////////////
use App\Http\Controllers\Staff\DashboardStaffController;
use App\Http\Controllers\Staff\ProfileStaffController;
//////////////////////////////////////////////////////////////////////

Route::get('/', function () {
    return view('landingPage');
})->name('landingPage');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('Content/dashboard', function () {
        return view('Content.dashboard');
    })->name('Content/dashboard');  

    Route::get('/dashboard', [ProductController::class, 'topFive'])->name('Content.dashboard');
    Route::get('/all-product', [ProductController::class, 'index'])->name('Content/allProduct');
    
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

    Route::get('/add-product', function () {
        return view('Content.addProduct');
    })->name('addProduct');

    Route::resource('products', ProductController::class);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


