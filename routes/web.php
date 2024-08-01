<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\UserController;
use App\Models\Penduduk;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'loginPage')->name('login');
    Route::post('login', 'loginRequest')->name('login.request');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.content');
    })->name('dashboard');

    Route::controller(UserController::class)->prefix('admin/user')->group(function () {
        Route::get('', 'index')->name('user');
        Route::get('/new', 'createUserPage')->name('create_user');
        Route::post('/add', 'createUserRequest')->name('add_user');
        Route::get('/update/{id}', 'editUserPage')->name('update_user');
        Route::post('/edit/{id}', 'editUserRequest')->name('edit_user');
        Route::post('/delete/{id}', 'deleteUserRequest')->name('delete_user');
    });

    Route::controller(PendudukController::class)->prefix('kependudukan/penduduk')->group(function () {
        Route::get('', 'index')->name('penduduk');
        Route::get('/new', 'createPendudukPage')->name('create_penduduk');
        Route::post('/add', 'createPendudukRequest')->name('add_penduduk');
        Route::get('/update/{id}', 'editPendudukPage')->name('update_penduduk');
        Route::post('/edit/{id}', 'editPendudukRequest')->name('edit_penduduk');
        Route::post('/delete/{id}', 'deletePendudukRequest')->name('delete_penduduk');
    });
});
