<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/hello', function () {
    return 'This is sample text';
});

Route::fallback(function () {
    return 'This is the fallback route';
});
