<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'storybook'], function () {
    Route::get('/app-bar', function () {
        return view('storybook.app-bar');
    });
    Route::get('/button', function () {
        return view('storybook.button');
    });

    Route::get('/card', function () {
        return view('storybook.card');
    });

    Route::get('/text-field', function () {
        return view('storybook.text-field');
    });
});
