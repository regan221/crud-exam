<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    if(session('user') != null) return redirect()->route('dashboard');
    return view('login');
});

Route::get('/login', function() {
    if(session('user') != null) return redirect()->route('dashboard');
    return view('login');
})->name('login-user');

Route::post('/login', [UserController::class, 'login'])->name('login-user');


Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('store-user');




Route::get('/logout', [UserController::class, 'logout'])->name('logout-user');

Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
Route::get('/post/create-post', [PostController::class, 'create'])->name('create-post');
Route::post('/post', [PostController::class, 'store'])->name('store-post');
Route::get('/post/{id}', [PostController::class, 'show']);
Route::put('/post/{id}', [PostController::class, 'update'])->name('update-post');
Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('delete-post');

Route::get('/profile', [UserController::class, 'index'])->name('profile');
Route::put('/profile/{id}', [UserController::class, 'update'])->name('update-profile');
