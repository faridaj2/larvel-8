<?php

use App\Http\Controllers\WebController;
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

Route::get('/', [WebController::class, 'index']);
Route::get('/login', [WebController::class, 'login'])->name('login');
Route::get('/produk', [WebController::class, 'produk']);
Route::get('/galeri', [WebController::class, 'galeri']);
Route::get('/about', [WebController::class, 'about']);
Route::get('/detail/{slug}', [WebController::class, 'detail']);
Route::get('/kategori/{slug}', [WebController::class, 'kategori']);
Route::post('/login', [WebController::class, 'login_']);
Route::get('/logout', [WebController::class, 'logout']);

#Mengakses Admin Page

Route::get('/admin', [WebController::class, 'slideshow_'])->middleware('auth');
Route::get('/admin/kategori', [WebController::class, 'kategori_'])->middleware('auth');
Route::get('/admin/produk', [WebController::class, 'produk_'])->middleware('auth');
Route::get('/admin/info', [WebController::class, 'info_'])->middleware('auth');
Route::get('/admin/galeri', [WebController::class, 'galeri_'])->middleware('auth');


#Mengakses Model Fitur
Route::post('/admin', [WebController::class, 'slideAdd'])->middleware('auth');
Route::get('/admin/delete/{id}', [WebController::class, 'slideDelete'])->middleware('auth');
Route::post('/admin/kategori', [WebController::class, 'kategoriUpdate'])->middleware('auth');
Route::get('/admin/kategori/delete/{id}', [WebController::class, 'hapusKategori'])->middleware('auth');
Route::post('/admin/produk', [WebController::class, 'produkAdd'])->middleware('auth');
Route::get('/admin/produk/delete/{id}', [WebController::class, 'produkDelete'])->middleware('auth');
Route::post('/admin/galeri', [WebController::class, 'galeriAdd'])->middleware('auth');
Route::get('/admin/galeri/delete/{slug}', [WebController::class, 'galeriDelete'])->middleware('auth');
