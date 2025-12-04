<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PembelianController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Semua route aplikasi. Pastikan file view dan controller sesuai path-nya.
|
*/

// Default route → login page
Route::get('/', function () {
    return view('auth.login');
});


/*
|--------------------------------------------------------------------------
| SUPER ADMIN ROUTES
|--------------------------------------------------------------------------
*/

// Dashboard Super Admin
Route::get('/superadmin/dashboard', function () {
    return view('superadmin.dashboard');
})->name('superadmin.dashboard');

Route::prefix('superadmin/kategoriproduk')->name('superadmin.kategoriproduk.')->group(function () {
    Route::get('/', [KategoriProdukController::class, 'index'])->name('index');
    Route::post('/store', [KategoriProdukController::class, 'store'])->name('store');
    Route::put('/update/{id}', [KategoriProdukController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [KategoriProdukController::class, 'destroy'])->name('delete');
});


Route::prefix('superadmin/produk')->name('superadmin.produk.')->group(function () {

    Route::get('/', [ProdukController::class, 'index'])->name('index');
    Route::get('/create', [ProdukController::class, 'create'])->name('create');
    Route::post('/store', [ProdukController::class, 'store'])->name('store');

    Route::get('/edit/{id_produk}', [ProdukController::class, 'edit'])->name('edit');
    Route::post('/update/{id_produk}', [ProdukController::class, 'update'])->name('update');

    // ROUTE DELETE HARUS DELETE BUKAN GET
    Route::delete('/delete/{id_produk}', [ProdukController::class, 'destroy'])->name('destroy');
});


Route::prefix('superadmin/supplier')->name('superadmin.supplier.')->group(function () {

    Route::get('/', [SupplierController::class, 'index'])->name('index');
    Route::post('/store', [SupplierController::class, 'store'])->name('store');

    Route::get('/edit/{id_supplier}', [SupplierController::class, 'edit'])->name('edit');
    Route::post('/update/{id_supplier}', [SupplierController::class, 'update'])->name('update');

    Route::delete('/delete/{id_supplier}', [SupplierController::class, 'destroy'])->name('destroy');

});


Route::prefix('superadmin/user')->name('superadmin.user.')->group(function () {

    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('destroy');
});

Route::prefix('superadmin/pembelian')->name('superadmin.pembelian.')->group(function () {
    Route::get('/', [PembelianController::class, 'index'])->name('index');
    Route::get('/create', [PembelianController::class, 'create'])->name('create');
    Route::post('/store', [PembelianController::class, 'store'])->name('store');
});

Route::prefix('superadmin/penjualan')->name('superadmin.penjualan.')->group(function () {
    Route::view('/', 'superadmin.penjualan.index')->name('index');
    Route::view('/create', 'superadmin.penjualan.create')->name('create');
});


Route::prefix('superadmin/pengeluaran')->name('superadmin.pengeluaran.')->group(function () {
    Route::view('/', 'superadmin.pengeluaran.index')->name('index');
    Route::view('/create', 'superadmin.pengeluaran.create')->name('create');
});

Route::prefix('superadmin/laporan')->name('superadmin.laporan.')->group(function () {
    Route::view('/LaporanPembelian', 'superadmin.laporan.LaporanPembelian')->name('LaporanPembelian');
    Route::view('/LaporanPenjualan', 'superadmin.laporan.LaporanPenjualan')->name('LaporanPenjualan');
    Route::view('/LaporanPengeluaran', 'superadmin.laporan.LaporanPengeluaran')->name('LaporanPengeluaran');
    Route::view('/Laporan-labarugi', 'superadmin.laporan.Laporan-labarugi')->name('Laporan-labarugi');
});

Route::prefix('superadmin/laporan')->name('superadmin.laporan.')->group(function () {
    Route::view('/laporan-labarugi', 'superadmin.laporan.laporan-labarugi')->name('laporan-labarugi');
});

Route::prefix('superadmin')->name('superadmin.')->group(function () {
    Route::view('/analisis-keuntungan', 'superadmin.analisis-keuntungan')->name('analisis-keuntungan');
});

Route::prefix('superadmin')->name('superadmin.')->group(function () {
    Route::view('/analisis-permintaan', 'superadmin.analisis-permintaan')->name('analisis-permintaan');
});


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');
