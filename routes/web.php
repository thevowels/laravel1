<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'registerForm']);
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [RegisterController::class, 'loginForm']);
Route::post('/login', [RegisterController::class, 'login']);

Route::get('/greet', function(){
    return view('greeting');
});
