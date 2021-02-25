<?php

use App\Http\Controllers\User\BookController as UserBookController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\GuestController::class, 'index'])->name('welcome');
Route::get('/books/{id}', [App\Http\Controllers\GuestController::class, 'show'])->name('showbook');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::resource('books', UserBookController::class);
    });

    // Admin routes
    Route::group(['middleware' => 'is_admin'], function () {
        Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
            Route::resource('books', AdminBookController::class);
        });
    });
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
