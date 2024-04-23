<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;
use App\Http\Controllers\PayformController;


Route::controller(PayformController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/list', 'list')->name('list');
    Route::get('/show', 'show')->name('show');
    Route::get('/edit', 'edit')->name('edit');
    Route::get('/delete', 'delete')->name('delete');
});