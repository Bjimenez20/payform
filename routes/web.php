<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;
use App\Http\Controllers\PayformController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Auth\Events\Logout;

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'show')->name('login');
    Route::post('/login', 'login')->name('login.login');
});

Route::get('/', [PayformController::class, 'create'])->name('create');

Route::group(['middleware' => 'auth'], function () {
    Route::controller(PayformController::class)->group(function () {
        Route::get('/home', 'home')->name('home');
        Route::post('/store', 'store')->name('store');
        Route::get('/list', 'list')->name('list');
        Route::get('/show', 'show')->name('show');
        Route::get('/edit', 'edit')->name('edit');
        Route::get('/delete', 'delete')->name('delete');
    });

    Route::controller(LogoutController::class)->group(function () {
        Route::get('/logout', 'logout')->name('logout');
    });
});
