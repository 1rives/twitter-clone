<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TwitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ DashboardController::class, 'index' ])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Twits Routes
|--------------------------------------------------------------------------
*/
Route::get('/twits/{twit}', [ TwitController::class, 'show' ])->name('twits.show');

Route::post('/twits', [ TwitController::class, 'store' ])->name('twits.store');

Route::get('/twits/{twit}/edit', [ TwitController::class, 'edit' ])->name('twits.edit');

Route::put('/twits/{twit}', [ TwitController::class, 'update' ])->name('twits.update');

Route::delete('/twits/{twit}', [ TwitController::class, 'destroy' ])->name('twits.destroy');

Route::post('/twits/{twit}/comments', [ CommentController::class, 'store' ])->name('twits.comments.store');

/*
|--------------------------------------------------------------------------
| Terms Routes
|--------------------------------------------------------------------------
*/

Route::get('/terms', function() {
    return view('terms');
});

/*
|--------------------------------------------------------------------------
| Register Routes
|--------------------------------------------------------------------------
*/

Route::get('/register', [ AuthController::class, 'register' ])->name('register');

Route::post('/register', [ AuthController::class, 'store' ]);
