<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// AUTH
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.p');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'create'])->name('register.create');
Route::get('/logout', function () {
    Auth::guard('web')->logout();
    return redirect()->action([AuthController::class, 'login']);
})->name('logout');

// Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
Route::get('cep/{cep}', [ProfileController::class, 'getCep']);
