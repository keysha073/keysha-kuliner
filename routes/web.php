<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/guest', function () {
    return redirect('/guest/Chefer/index.html');
});

Route::get('/admin', function () {
    return redirect('/spark-admin-1.0.0/index.html');
});
