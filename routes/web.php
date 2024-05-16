<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PayformController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'show')->name('login');
    Route::post('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
});

Route::get('/', [PayformController::class, 'create'])->name('create');
Route::post('/store', [PayformController::class, 'store'])->name('store');

Route::group(['middleware' => 'auth'], function () {
    Route::controller(PayformController::class)->group(function () {
        Route::get('/list', 'list')->name('list');
        Route::get('/show', 'show')->name('show');
        Route::get('/edit', 'edit')->name('edit');
        Route::get('/delete', 'delete')->name('delete');
    });
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
