<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\TwitController;
use App\Http\Controllers\TwittahLikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
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

Route::get('/feed', FeedController::class)->name('feed')->middleware('auth');

Route::get('/lang/{lang}', function ($lang){
    session()->put('locale', $lang);

    return redirect()->route('dashboard');
})->name('lang');

/*
|--------------------------------------------------------------------------
| Twits Routes
|--------------------------------------------------------------------------
*/

Route::resource('twits', TwitController::class)->except(['index', 'create', 'show'])->middleware('auth');

Route::resource('twits', TwitController::class)->only(['show']);

Route::resource('twits.comments', CommentController::class)->only(['store'])->middleware('auth');


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::resource('users', UserController::class)->only(['show']);
Route::resource('users', UserController::class)->only(['edit', 'update'])->middleware('auth');

Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->name('users.follow')->middleware('auth');

Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->name('users.unfollow')->middleware('auth');

Route::get('profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');

Route::post('twits/{twit}/like', [TwittahLikeController::class, 'like'])->name('twits.like')->middleware('auth');

Route::post('twits/{twit}/unlike', [TwittahLikeController::class, 'unlike'])->name('twits.unlike')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Terms Routes
|--------------------------------------------------------------------------
*/

Route::get('/terms', function() {
    return view('terms');
})->name('terms');

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth', 'can:admin');
