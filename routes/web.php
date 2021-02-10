<?php

use Illuminate\Support\Facades\Route;

//Controllers
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('login');
});

//Route::get('/add', [PostController::class, 'store']);
Route::get('/post', [PostController::class, 'index']);
Route::post('/post/add', [PostController::class, 'store']);

Route::get('/post/create', function () {
    return view('/post/create');
});


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');