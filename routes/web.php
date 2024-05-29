<?php

use Illuminate\Support\Facades\Route;

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
//Login LogOut
Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

//Register
Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register');

//change password
Route::get('/change-password', [\App\Http\Controllers\Auth\PasswordController::class, 'index'])->name('password');
Route::put('/change-password', [\App\Http\Controllers\Auth\PasswordController::class, 'update'])->name('password');

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin
Route::group(['prefix'=>'admin', 'middleware'=>['admin','auth'], 'as' => 'admin.'], function(){
    Route::get('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('index');
});

//User
Route::group(['prefix'=>'user', 'middleware'=>['user','auth'], 'as' => 'user.'], function(){
    Route::get('/profile', [\App\Http\Controllers\User\ProfileController::class, 'index'])->name('index');
});