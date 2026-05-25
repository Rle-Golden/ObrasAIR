<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

// Rutas API sin protección CSRF
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [RegisterController::class, 'login']);
