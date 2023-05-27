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

Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('home');
Route::get('/detail/{id}', [App\Http\Controllers\ProductController::class, 'detail'])->name('detail');
Route::get('/update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('update');
Route::post('/update/{id}', [App\Http\Controllers\ProductController::class, 'updateSave'])->name('updateSave');

