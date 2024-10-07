<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Signup Routes
Route::get('register', [AuthController::class, 'registerForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// Login Routes
Route::get('login', [AuthController::class, 'loginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

// Logout Route
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// If already registered
Route::post('registered', [AuthController::class, 'alreadyRegistered'])->name('registered');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
