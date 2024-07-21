<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('show-login-form');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', \App\Livewire\User\Dashboard::class)->name('dashboard');
    Route::get('/laboratory', \App\Livewire\User\Laboratory::class)->name('laboratory');
});



Route::group(['prefix' => 'storybook'], function () {
    Route::get('/app-bar', [\App\Http\Controllers\StorybookController::class, 'appBar']);
    Route::get('/button', [\App\Http\Controllers\StorybookController::class, 'button']);
    Route::get('/card', [\App\Http\Controllers\StorybookController::class, 'card']);
    Route::get('/text-field', [\App\Http\Controllers\StorybookController::class, 'textField']);
});
