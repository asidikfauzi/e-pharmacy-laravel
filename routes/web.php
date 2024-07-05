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
Route::get('/detail/{id}', [\App\Http\Controllers\HomeController::class, 'show'])->name('detail');

//Admin
Route::group(['prefix'=>'admin', 'middleware'=>['admin','auth'], 'as' => 'admin.'], function(){
    Route::get('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('index');

    //Order
    Route::group(['prefix'=>'order', 'as' => 'order.'], function() {
        Route::get('/', [\App\Http\Controllers\Admin\OrderController::class, 'index'])->name('index');
        Route::get('/get-data', [\App\Http\Controllers\Admin\OrderController::class, 'getData'])->name('getData');
        Route::get('/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'show'])->name('show');
        Route::get('/accept/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'accept'])->name('accept');
        Route::get('/reject/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'reject'])->name('reject');
    });

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

    //Recap
    Route::group(['prefix'=>'recap', 'as' => 'recap.'], function() {
        Route::get('/', [\App\Http\Controllers\Admin\RecapController::class, 'index'])->name('index');
        Route::get('/get-data', [\App\Http\Controllers\Admin\RecapController::class, 'getData'])->name('getData');
    });
});

//User
Route::group(['prefix'=>'user', 'middleware'=>['user','auth'], 'as' => 'user.'], function(){
    //Profile
    Route::group(['prefix'=>'profile'], function() {
        Route::get('/', [\App\Http\Controllers\User\ProfileController::class, 'index'])->name('index');
        Route::put('/', [\App\Http\Controllers\User\ProfileController::class, 'update'])->name('update');
    });

    //Address
    Route::group(['prefix'=>'address', 'as' => 'address.'], function() {
        Route::get('/', [\App\Http\Controllers\User\AddressController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\User\AddressController::class, 'create'])->name('create');
        Route::post('/create', [\App\Http\Controllers\User\AddressController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [\App\Http\Controllers\User\AddressController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [\App\Http\Controllers\User\AddressController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [\App\Http\Controllers\User\AddressController::class, 'destroy'])->name('destroy');
    });

    //cart
    Route::group(['prefix'=>'cart', 'as' => 'cart.'], function() {
        Route::get('/', [\App\Http\Controllers\User\CartController::class, 'index'])->name('index');
        Route::get('/{id}', [\App\Http\Controllers\User\CartController::class, 'store'])->name('store');
        Route::post('/{id}', [\App\Http\Controllers\User\CartController::class, 'create'])->name('store');
        Route::get('/delete/{id}', [\App\Http\Controllers\User\CartController::class, 'destroy'])->name('destroy');
    });

    //payments
    Route::group(['prefix'=>'payment', 'as' => 'payment.'], function() {
        Route::get('/{id}', [\App\Http\Controllers\User\PaymentController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\User\PaymentController::class, 'store'])->name('store');
        Route::put('/{id}', [\App\Http\Controllers\User\PaymentController::class, 'update'])->name('update');
    });

    //history
    Route::group(['prefix'=>'history', 'as' => 'history.'], function() {
        Route::get('/', [\App\Http\Controllers\User\HistoryController::class, 'index'])->name('index');
        Route::get('/get-data', [\App\Http\Controllers\User\HistoryController::class, 'getData'])->name('getData');
        Route::get('/show', [\App\Http\Controllers\User\HistoryController::class, 'show'])->name('show');
    });
});
