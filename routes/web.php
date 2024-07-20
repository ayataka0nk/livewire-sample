<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sandbox', function () {
    return view('sandbox');
});

Route::group(['prefix' => 'storybook'], function () {
    Route::get('/app-bar', function () {
        return view('storybook.app-bar');
    });
    Route::get('/button', function () {
        return view('storybook.button');
    });
});
