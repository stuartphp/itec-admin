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
Route::prefix('admin')->middleware(['auth', 'web'])->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('profile', [App\Http\Controllers\Admin\Users\ProfileController::class, 'edit']);
    });
    Route::prefix('accounting')->group(function () {
        Route::get('financial-years', [\App\Http\Controllers\Admin\Accounting\LivewireController::class, 'financial_years']);
        Route::get('periods', [\App\Http\Controllers\Admin\Accounting\LivewireController::class, 'periods']);
    });
});
