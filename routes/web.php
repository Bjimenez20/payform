<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PayformController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeOtherController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;

Route::get('/', [PayformController::class, 'create'])->name('create');
Route::post('/store', [PayformController::class, 'store'])->name('store');

Route::group(['middleware' => 'auth'], function () {
    Route::controller(PayformController::class)->group(function () {
        Route::get('/list', 'list')->name('list');
        Route::get('/listother', 'listother')->name('listother');
        Route::get('/show', 'show')->name('show');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        Route::get('/delete', 'delete')->name('delete');
    });
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/homeother', [HomeOtherController::class, 'index'])->name('homeother');
