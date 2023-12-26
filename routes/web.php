<?php

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

Route::redirect('login', 'admin/login');

Route::get('/', function () {
    return view('home');
});

Route::get('produk', function () {
    return view('pages.product');
});

Route::get('artikel', function () {
    return view('pages.article');
});

Route::get('aktivitas', function () {
    return view('pages.activity');
});

Route::get('galeri', function () {
    return view('pages.gallery');
});

Route::get('hubungi', function () {
    return view('pages.contact');
});
