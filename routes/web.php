<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OTPController;
//////////////////////////////////////////////////////////////////////
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\MedlogController;
use App\Http\Controllers\Admin\ProfileAdminController;
//////////////////////////////////////////////////////////////////////
use App\Http\Controllers\Staff\ProductStaffController;
use App\Http\Controllers\Staff\DashboardStaffController;
use App\Http\Controllers\Staff\ProfileStaffController;
//////////////////////////////////////////////////////////////////////

Route::view('/', 'dashboard');
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

Route::view('dashboardStaff', '/Staff/dashboardStaff');
