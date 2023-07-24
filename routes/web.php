<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GudangController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KasirController;

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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/gudang', [GudangController::class, 'index'])->name('gudang.index');
    Route::post('/gudang', [GudangController::class, 'store'])->name('gudang.store');
    Route::get('/gudang/{id}', [GudangController::class, 'show'])->name('gudang.show');

    //product
    //kategori
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/product', [ProductController::class, 'index'])->name('product.index');
        Route::post('/product', [ProductController::class, 'store'])->name('product.store');
        Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
        Route::get('/kategori', [CategoryController::class, 'index'])->name('category.index');
        Route::post('/', [CategoryController::class, 'store'])->name('category.store');
        Route::put('/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::get('/kasir', [KasirController::class, 'index'])->name('kasir.index');
        Route::post('/kasir', [KasirController::class, 'store'])->name('kasir.store');
        Route::put('/kasir/{id}', [KasirController::class, 'update'])->name('kasir.update');
        Route::put('/kasir/{id}', [KasirController::class, 'update'])->name('kasir.update');
        Route::get('/kasir/{id}', [KasirController::class, 'destroy'])->name('kasir.destroy');
    });
});
