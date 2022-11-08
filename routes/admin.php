<?php 

use Illuminate\Support\Facades\Route;


Route::get(config('app.admin_prefix').'/login', [App\Http\Controllers\Backend\AdminController::class, 'loginForm'])->name('admin.login');
Route::post(config('app.admin_prefix').'/login', [App\Http\Controllers\Backend\AdminController::class, 'login'])->name('submit.admin.login');


Route::middleware(['auth:admin'])->prefix(config('app.admin_prefix'))->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Backend\AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/events', App\Http\Controllers\Backend\ChurchEventsController::class);
    Route::resource('/categories', App\Http\Controllers\Backend\CategoryController::class);
    Route::resource('/products', App\Http\Controllers\Backend\ProductController::class);
    Route::resource('/livestreams', App\Http\Controllers\Backend\LiveStreamController::class);
}); 
