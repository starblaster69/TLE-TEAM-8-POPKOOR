<?php

use App\Http\Controllers\MusicTracksController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group that
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [PostController::class, 'index'])->name('home');

Route::resource('posts', PostController::class);

Route::resource('repertoire', MusicTracksController::class);

//Users (Public)
Route::get('/users/profile', [UserController::class, 'show'])->name('users.show');
Route::get('/users/profile/settings', [UserController::class, 'edit'])->name('users.edit');
//Route::post('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');

//User Role Changes (Public)
Route::post('/users/{user}/make-admin', [UserController::class, 'makeAdmin'])->name('users.make-admin');
Route::post('/users/{user}/verify-guest', [UserController::class, 'verifyGuest'])->name('users.verify-guest');

//Member routes
//Route::middleware(['auth', 'verifiedUser'])->group(function () {
    //Users (Member)
//Route::get('/ledensite', [MemberController::class, 'index'])->name('member.index');
    Route::resource('/member', MemberController::class);
//});

//Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    //Users (Admin)
    Route::get('/users', [UserController::class, 'index'])->name('users');
});
