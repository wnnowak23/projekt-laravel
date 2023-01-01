<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});


/*Route::get('/hello', function () {
    return view('hello');
});*/


Route::get('/', [WelcomeController::class, 'index']);
Route::get('/hello', [HelloWorldController::class, 'show']);



Route::middleware(['auth', 'verified'])->group(function(){
    Route::middleware(['can:isAdmin'])->group(function(){
        Route::get('/products/{product}/download', [ProductController::class, 'downloadImage'])->name('products.downloadImage');
        Route::resource('products', ProductController::class);

        Route::resource('users', UserController::class)->only([
            'index', 'edit', 'update', 'destroy'
        ]);
        //Route::get('/users/list', [UserController::class, 'index']);
        //Route::delete('/users/{user}', [UserController::class, 'destroy']);
    });

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{product}', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Auth::routes(['verify' => true]);






//Route::get('/products', [ProductController::class, 'index'])->name('products.index')->middleware('auth');
//Route::get('/products/create', [ProductController::class, 'create'])->name('products.create')->middleware('auth');
//Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show')->middleware('auth');
//Route::post('/products', [ProductController::class, 'store'])->name('products.store')->middleware('auth');
//Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit')->middleware('auth');
//Route::post('/products/{product}', [ProductController::class, 'update'])->name('products.update')->middleware('auth');
//Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware('auth');
