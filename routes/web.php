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

Route::get('/', [HomeController::class, 'index']);

Route::get('produk', [ProductController::class, 'index']);

Route::group(['prefix' => 'artikel'], function () {
    Route::controller(ArticleController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('{slug}', 'detail');
    });
});

Route::get('aktivitas', [ActivityController::class, 'index']);

Route::controller(ContactController::class)->group(function () {
    Route::get('hubungi', 'index');
    Route::post('send-message', 'sendMessage');
});
