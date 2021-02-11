<?php

use Illuminate\Support\Facades\Route;

//Controllers
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('/auth/login');
});
Route::get('/sign-up', function () {
    return view('/auth/signup');
});
Route::get('/my-posts', function () {
    return view('/post/my-post');
});
Route::get('/posts', [PostController::class, 'index']);

Route::get('/post/create', function () {
    return view('/post/create');
});
