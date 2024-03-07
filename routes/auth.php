<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Includes: Login, Logout, Register
*/

// Fixes the possibility of accessing those routes when logged in
Route::group(['middleware' => 'guest'], function(){
    Route::get('/register', [ AuthController::class, 'register' ])->name('register');
    Route::post('/register', [ AuthController::class, 'store' ]);

    Route::get('/login', [ AuthController::class, 'login' ])->name('login');
    Route::post('/login', [ AuthController::class, 'authenticate' ]);
});

Route::get('/logout', [ AuthController::class, 'logout' ])->middleware('auth')->name('logout');
