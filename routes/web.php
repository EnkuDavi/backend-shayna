<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\TransactionController;

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


Route::get('/', [DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::resource('product',ProductController::class);

Route::get('/gallery',[ProductGalleryController::class,'index'])->name('gallery');
Route::get('/gallery/create',[ProductGalleryController::class,'create'])->name('gallery.create');
Route::post('/gallery/store',[ProductGalleryController::class,'store'])->name('gallery.store');
Route::delete('/gallery/{id}',[ProductGalleryController::class,'destroy'])->name('gallery.destroy');


Route::resource('transaction',TransactionController::class);
require __DIR__.'/auth.php';
