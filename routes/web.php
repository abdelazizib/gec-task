<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Application\ApplicationController;
use App\Http\Controllers\HomeController;

// ---------------  \\
Route::get('/', HomeController::class)->name('home');
// ---------------  \\
Route::controller(AuthController::class)
    ->prefix('auth')
    ->as('auth.')
    ->group(function () {
        // ---------------  \\
        Route::middleware('guest')->group(function () {
            Route::get('register', 'registerView')->name('register.view');
            Route::post('register', 'register')->name('register');
            // ---------------  \\
            Route::get('login', 'loginView')->name('login.view');
            Route::post('login', 'login')->name('login');
            // ---------------  \\
        });
        // ---------------  \\
        Route::post('logout', 'logout')->name('logout')->middleware('auth');
    });
// ---------------  \\
Route::middleware('auth')
    ->as('application.')
    ->controller(ApplicationController::class)
    ->group(function () {
        Route::get('application', 'create')->name('create');
        Route::post('application', 'store')->name('store');
    });