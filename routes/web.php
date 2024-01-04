<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

/**
 * Redirect route
 * @route login to admin/login
 */
Route::redirect('login', 'admin/login');

/**
 * Pages routes
 * @all pages route managed with controller
 */
Route::get('/', [HomeController::class, 'index']);
Route::get('produk', [ProductController::class, 'index']);
Route::get('artikel', [ArticleController::class, 'index']);
Route::get('aktivitas', [ActivityController::class, 'index']);
Route::get('galeri', [GalleryController::class, 'index']);
Route::get('hubungi', [ContactController::class, 'index']);
