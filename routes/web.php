<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;

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
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard2');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Kategori
Route::controller(KategoriController::class)->group(function() {
    // tampil data kategori
    Route::get('/dashboard/kategori', 'index');
    // tambah
    Route::get('/dashboard/kategori/create', 'create');
    Route::post('/dashboard/kategori/create', 'store');
    // hapus
    Route::delete('/dashboard/kategori/{id}', 'destroy');
    // edit
    Route::get('/dashboard/kategori/{id}/edit', 'edit');
    Route::put('/dashboard/kategori/{id}', 'update');
})->middleware(['auth', 'verified']);

Route::get('/contohform', 'App\Http\Controllers\ContohformController@index')->middleware(['auth', 'verified']);
Route::post('/contohform', 'App\Http\Controllers\ContohformController@store')->middleware(['auth', 'verified']);
Route::get('/contohform/fetchconntohform', 'App\Http\Controllers\ContohformController@fetchcontohform')->middleware(['auth', 'verified']);
Route::get('/contohform/destroy/{id}', 'App\Http\Controllers\ContohformController@destroy')->middleware(['auth', 'verified']);
Route::get('/contohform/edit/{id}', 'App\Http\Controllers\ContohformController@edit')->middleware(['auth', 'verified']);

Route::get('/upload', 'App\Http\Controllers\ContohuploadController@upload');
Route::post('/upload/proses', 'App\Http\Controllers\ContohuploadController@proses_upload');

Route::get('/penjualan', 'App\Http\Controllers\PenjualanController@index')->middleware(['auth']);
Route::get('/penjualan/barang/{id}', 'App\Http\Controllers\PenjualanController@getDataBarang')->middleware(['auth']);
Route::post('/penjualan', 'App\Http\Controllers\PenjualanController@store')->middleware(['auth']);
Route::get('/penjualan/keranjang', 'App\Http\Controllers\PenjualanController@keranjang')->middleware(['auth']);
Route::get('/penjualan/invoice', 'App\Http\Controllers\PenjualanController@invoice')->middleware(['auth']);
Route::get('/penjualan/jmlinvoice', 'App\Http\Controllers\PenjualanController@getInvoice')->middleware(['auth']);
Route::get('/penjualan/destroypenjualandetail/{id}', 'App\Http\Controllers\PenjualanController@destroypenjualandetail')->middleware(['auth']);
Route::get('/penjualan/barang', 'App\Http\Controllers\PenjualanController@getDataBarangAll')->middleware(['auth']);
Route::get('/penjualan/jmlbarang', 'App\Http\Controllers\PenjualanController@getJumlahBarang')->middleware(['auth']);
Route::get('/penjualan/keranjangjson', 'App\Http\Controllers\PenjualanController@keranjangjson')->middleware(['auth']);
Route::get('/penjualan/checkout', 'App\Http\Controllers\PenjualanController@checkout')->middleware(['auth']);

// transaksi pembayaran viewkeranjang
Route::get('/pembayaran/viewkeranjang','App\Http\Controllers\PembayaranController@viewkeranjang')->middleware(['auth']);
Route::post('/pembayaran/store','App\Http\Controllers\PembayaranController@store')->middleware(['auth']);
Route::get('/pembayaran','App\Http\Controllers\PembayaranController@index')->middleware(['auth']);
Route::get('/pembayaran/viewstatus','App\Http\Controllers\PembayaranController@viewstatus')->middleware(['auth']);
Route::get('/pembayaran/viewapprovalstatus','App\Http\Controllers\PembayaranController@viewapprovalstatus')->middleware(['auth','admin']);
Route::get('/pembayaran/approve/{no_transaksi}','App\Http\Controllers\PembayaranController@approve')->middleware(['auth']);
Route::get('/pembayaran/viewstatusPG','App\Http\Controllers\PembayaranController@viewstatusPG')->middleware(['auth']);

// Midtrans
Route::get('/midtrans', 'App\Http\Controllers\CobaMidtransController@index')->middleware(['auth'],['admin']);
Route::get('/midtrans/status', 'App\Http\Controllers\CobaMidtransController@cekstatus')->middleware(['auth'],['admin']);
Route::get('/midtrans/tes/{id}', 'App\Http\Controllers\CobaMidtransController@tes')->middleware(['auth'],['admin']);
Route::get('/midtrans/bayar', 'App\Http\Controllers\CobaMidtransController@bayar')->middleware(['auth']);
Route::post('/midtrans/proses_bayar', 'App\Http\Controllers\CobaMidtransController@proses_bayar')->middleware(['auth']);

require __DIR__.'/auth.php';