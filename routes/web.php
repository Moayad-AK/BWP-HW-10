<?php

use App\Http\Controllers\CartItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

// Google Socialite Routes
Route::get('/auth/redirect', [SocialiteController::class, 'redirectToGoogle'])
    ->name('google.redirect');

Route::get('/auth/callback', [SocialiteController::class, 'handleGoogleCallback'])
    ->name('google.callback');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
})->name('about');

// Products
Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])
    ->name('products.create')
    ->middleware('auth')
    ->can('create-product');

Route::post('/products', [ProductController::class, 'store'])
    ->name('products.store')
    ->middleware('auth')
    ->can('create-product');

Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.show');

Route::get('/products/{product}/edit', [ProductController::class, 'edit'])
    ->name('products.edit')
    ->middleware('auth')
    ->can('edit-product', 'product');

Route::put('/products/{product}', [ProductController::class, 'update'])
    ->name('products.update')
    ->middleware('auth')
    ->can('edit-product', 'product');

Route::delete('/products/{product}', [ProductController::class, 'destroy'])
    ->name('products.destroy')
    ->middleware('auth')
    ->can('edit-product', 'product');

// Route::resource('products', ProductController::class);

//Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])
    ->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

//CartItems 
Route::get('/cartitems', [CartItemController::class, 'index'])
    ->middleware('auth');
Route::post('/cartitems', [CartItemController::class, 'store'])
    ->middleware('auth');
Route::delete('/cartitems', [CartItemController::class, 'destroy'])
    ->middleware('auth');

//Order
Route::get('/orders/create', [OrderController::class, 'create'])
    ->name('orders.create')
    ->middleware('auth');

Route::post('/orders', [OrderController::class, 'store'])
    ->name('orders.store')
    ->middleware('auth');
