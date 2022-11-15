<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\PagesController::class, 'welcome'])->name('welcome');
Route::get('/products', [App\Http\Controllers\PagesController::class, 'products'])->name('products');
Route::get('/products/cart', [App\Http\Controllers\PagesController::class, 'cart'])->name('products.cart');
Route::get('/add_product_to_cart/{id}', [App\Http\Controllers\ProductsController::class, 'addProductToCart']);
Route::get('/about', [App\Http\Controllers\PagesController::class, 'about'])->name('about');
Route::get('/sermon', [App\Http\Controllers\PagesController::class, 'sermon'])->name('sermon');
Route::get('/sermon-read/{slug}', [App\Http\Controllers\PagesController::class, 'sermon_read']);
Route::get('/events', [App\Http\Controllers\PagesController::class, 'events'])->name('events');
Route::get('/event-read/{slug}', [App\Http\Controllers\PagesController::class, 'event_read']);
Route::get('/contact', [App\Http\Controllers\PagesController::class, 'contact'])->name('contact');
Route::post('/save_contact', [App\Http\Controllers\PagesController::class, 'save_contact']);
Route::get('/products/checkout', [App\Http\Controllers\PagesController::class, 'checkout'])->name('products.checkout');
Route::get('/saveOrder', [App\Http\Controllers\ProductsController::class, 'saveOrder']);
Route::get('/products/thankyou', [App\Http\Controllers\PagesController::class, 'thankyou'])->name('products.thankyou');







Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
