<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return Inertia::render('Dashboard');
        })->name('dashboard');
    });

Route::get('/offline', function () {
    return view('vendor/laravelpwa/offline');
});

/*
Route::middleware(['auth:sanctum', 'verified'])->namespace('System')->group(function () {
    // Dashboard
    Route::get('/system/dashboard', function () {
        return Inertia::render('System/Dashboard');
    })->name('system_dashboard');

    // Users
    Route::prefix('/users')->group(function () {
        Route::get('/view', function () {
            return Inertia::render('System/Users');
        })->name('system.users.view');

        Route::post('/auth/register', 'Auth\RegisteredUserController@store');
    });
    Route::resource('/users', 'UserController');

    // Institutions */
Route::prefix('/tenant')->namespace('System')->group(function () {
    /*
    Route::get('/view', function () {
        return Inertia::render('System/Institutions');
    })->name('system.institutions.view');

    Route::get('/information/{uuid}', function ($uuid) {
        return Inertia::render('System/Institutions/Components/information', ['uuid' => $uuid]);
    })->name('system.institutions.information');
    */

    Route::resource('/', 'WebSiteController');
    /*
    Route::get('/getInformation', 'WebsiteController@getInformation');
    Route::post('/store/user', 'WebsiteController@storeUser');
    Route::put('/update/user/{id}', 'WebsiteController@updateUser');
    */
});
// });
