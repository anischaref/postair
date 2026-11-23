<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index' ])->name("home");

Route::get('/bonjour/{user}', [ColorController::class, 'index'])->name('bonjour'); {
};

Route::middleware('auth')->group(function(){

Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class,'update']);
Route::delete('/posts/{post}', [PostController::class, 'destroy']);
});

Route::view('/register', 'auth.register')
->middleware('guest')
->name('register');
Route::post('/register', Register::class)->middleware('guest');

Route::view('/login', 'auth.login')
->middleware('guest')
->name('login');
Route::post('/login', Login::class)
->middleware('guest');
Route::post('/logout', Logout::class)
->middleware('auth')
->name('logout');


