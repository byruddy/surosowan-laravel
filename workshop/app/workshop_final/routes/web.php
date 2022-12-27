<?php

use Illuminate\Support\Facades\Route;

// Koneksi ke Controller Barang
use App\Http\Controllers\BarangController;

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

// Melihat semua barang menggunakan route method GET
Route::get('/barang', [BarangController::class, 'index']);

// Melihat form tambah barang menggunakan route method GET
Route::get('/barang/tambah', [BarangController::class, 'create']);


// Pengguna mengirimkan data (insert) menggunakan route method POST
Route::post('/barang', [BarangController::class, 'store']);