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
Route::get('/shop', [\App\Http\Controllers\HomeController::class, 'shop'])->name('shop');

//Admin
Route::group(['prefix'=>'admin', 'middleware'=>['admin','auth'], 'as' => 'admin.'], function(){
    Route::get('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('index');
    
    //Category
    Route::group(['prefix'=>'category', 'as' => 'category.'], function() {
        Route::get('/', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('index');
        Route::get('/get-data', [\App\Http\Controllers\Admin\CategoryController::class, 'getData'])->name('getData');
        Route::get('/create', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('create');
        Route::post('/create', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('store');
        Route::get('/{id}/update', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('update');
        Route::get('/{id}/destroy', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('destroy');
    });
    
    //Products
    Route::group(['prefix'=>'product', 'as' => 'product.'], function() {
        Route::get('/', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('index');
        Route::get('/get-data', [\App\Http\Controllers\Admin\ProductController::class, 'getData'])->name('getData');
        Route::get('/create', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('create');
        Route::post('/create', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('store');
        Route::get('/{id}/update', [\App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('update');
        Route::get('/{id}/destroy', [\App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('destroy');
    });
});

//User
Route::group(['prefix'=>'user', 'middleware'=>['user','auth'], 'as' => 'user.'], function(){
    Route::get('/profile', [\App\Http\Controllers\User\ProfileController::class, 'index'])->name('index');
});