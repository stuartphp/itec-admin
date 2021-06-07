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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('selection/{id}', [App\Http\Controllers\HomeController::class, 'selection'])->name('selection');

Route::prefix('admin')->middleware(['auth', 'web'])->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::prefix('settings')->group(function () {
        Route::resource('users', \App\Http\Controllers\Admin\Settings\UsersContoller::class);
    });
    Route::prefix('products')->group(function(){
        Route::resource('/', \App\Http\Controllers\Admin\Products\ProductsController::class);
    });
    Route::prefix('users')->group(function () {
        Route::get('profile', [App\Http\Controllers\Admin\Users\ProfileController::class, 'edit']);
    });
    Route::prefix('management')->group(function () {
        Route::resource('customers', \App\Http\Controllers\Admin\Management\CustomersController::class);
        Route::resource('orders', \App\Http\Controllers\Admin\Management\OrdersController::class);
    });
});
