<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\RegisterController;

Route::post('/api/register', [RegisterController::class, 'store'])
    ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);

Route::post('/api/login', [RegisterController::class, 'login'])
    ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);

Route::post('/api/logout', [RegisterController::class, 'logout'])
    ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);

Route::post('/api/assign-role', [RegisterController::class, 'assignRole'])
    ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);

Route::post('/api/password/forgot', [\App\Http\Controllers\PasswordResetController::class, 'forgot'])
    ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);

Route::post('/api/password/reset', [\App\Http\Controllers\PasswordResetController::class, 'reset'])
    ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);

Route::get('/', function () {
    $fullPath = base_path('1_ObrasAIR/Vista/Main/index.php');

    if (! File::exists($fullPath)) {
        abort(404);
    }

    return Response::file($fullPath, [
        'Content-Type' => File::mimeType($fullPath) ?: 'text/html',
    ]);
})->name('home');

Route::get('/Css/{path}', function ($path) {
    $fullPath = base_path('1_ObrasAIR/Vista/Css/'.$path);

    if (! File::exists($fullPath) || File::isDirectory($fullPath)) {
        abort(404);
    }

    return Response::file($fullPath, [
        'Content-Type' => 'text/css',
    ]);
})->where('path', '.*');

Route::get('/css/{path}', function ($path) {
    $fullPath = base_path('1_ObrasAIR/Vista/Css/'.$path);

    if (! File::exists($fullPath) || File::isDirectory($fullPath)) {
        abort(404);
    }

    return Response::file($fullPath, [
        'Content-Type' => 'text/css',
    ]);
})->where('path', '.*');

Route::get('/Image/{path}', function ($path) {
    $fullPath = base_path('1_ObrasAIR/Vista/Image/'.$path);

    if (! File::exists($fullPath) || File::isDirectory($fullPath)) {
        abort(404);
    }

    return Response::file($fullPath, [
        'Content-Type' => File::mimeType($fullPath) ?: 'application/octet-stream',
    ]);
})->where('path', '.*');

Route::get('/image/{path}', function ($path) {
    $fullPath = base_path('1_ObrasAIR/Vista/Image/'.$path);

    if (! File::exists($fullPath) || File::isDirectory($fullPath)) {
        abort(404);
    }

    return Response::file($fullPath, [
        'Content-Type' => File::mimeType($fullPath) ?: 'application/octet-stream',
    ]);
})->where('path', '.*');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';

Route::get('/{path}', function ($path) {
    $base = base_path('1_ObrasAIR/Vista/Main');
    $path = trim($path, '/');

    if ($path === '') {
        $path = 'index.php';
    }

    $fullPath = $base.DIRECTORY_SEPARATOR.$path;

    if (! File::exists($fullPath) || File::isDirectory($fullPath)) {
        abort(404);
    }

    return Response::file($fullPath, [
        'Content-Type' => File::mimeType($fullPath) ?: 'text/html',
    ]);
})->where('path', '.*');

