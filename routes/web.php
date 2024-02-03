<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\Book;
// Add to cart controller and model below
use App\Http\Controllers\CartController;
use App\Models\MyCart;

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

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

// Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/store', [HomeController::class, 'storebook'])->name('store');
Route::get('/view/{id}', [HomeController::class, 'viewbook'])->name('view');
Route::post('/view/{id}', [CartController::class, 'addbook'])->name('add');
Route::get('/mycart',[CartController::class, 'cart'])->name('mycart');
Route::delete('/delete/{id}', [CartController::class, 'removeitem'])->name('remove');

// Checkout route

Route::get('/checkout', [CartController::class, 'checkoutitems'])->name('checkout');
Route::post('/purchase', [CartController::class, 'purchaseitems'])->name('purchase');

// Other routes

Route::get('/csrf-cookie', function () {
    return response()->json(['message' => 'CSRF token cookie set successfully'], 200)
        ->withCookie(csrf_cookie());
});
