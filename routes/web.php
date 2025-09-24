<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/listar', function () {
    return view('listar');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/login', function () {
    return view('auth.login');
});


require __DIR__.'/auth.php';
