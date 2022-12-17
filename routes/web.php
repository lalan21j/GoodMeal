<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::resource('/products', 'ProductsController');
Route::resource('/store', 'StoreController');
Route::resource('/orderLists', 'OrderListsController');
Route::get('/', 'StoreController@index');
