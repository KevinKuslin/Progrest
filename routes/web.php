<?php

use App\Http\Controllers\CollabController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('landing.index'); 
}); 

Route::get('/sign-in', function() {
    return view('auth.signin'); 
})->name('signin.view'); 

Route::get('/register', function() {
    return view('auth.register'); 
})->name('register.view'); 

Route::get('/dashboard', [DashboardController::class, 'index']); 
Route::get('/projects', [ProjectController::class, 'index']); 
Route::get('/collab', [CollabController::class, 'index']); 
Route::get('/profile', [ProfileController::class, 'index']); 