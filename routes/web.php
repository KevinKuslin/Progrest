<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CollabController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('landing.index'); 
})->name('landing'); 

Route::get('/register', function() {
    return view('auth.register'); 
})->name('register'); 

Route::get('/login', [AuthController::class, 'index'])->name('login'); 
Route::post('/login', [AuthController::class, 'login']); 
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth'); 

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware('auth')->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index']); 
Route::get('/projects', [ProjectController::class, 'index']); 
Route::get('/collab', [CollabController::class, 'index']); 
Route::get('/profile', [ProfileController::class, 'index']); 