<?php

use App\Http\Controllers\FermentasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\PageJenis;
use App\Http\Livewire\Admin\PageSatuan;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Admin\CrudFermentasi;
use App\Http\Livewire\Admin\PageCustomer;
use App\Http\Livewire\Admin\PageSupplier;
use App\Http\Livewire\Transaksi\PageBank;
use App\Http\Livewire\Admin\DashboardAdmin;
use App\Http\Livewire\Admin\PageBarangMasuk;
use App\Http\Livewire\Admin\PageBuatPesanan;
use App\Http\Livewire\Admin\PageBarangKeluar;
use App\Http\Livewire\Admin\PagelistBahanBaku;
use App\Http\Livewire\Admin\PageProduk;
use App\Http\Livewire\Admin\PageProdukFermentasi;
use App\Http\Livewire\Admin\PageStockBahanBaku;
use App\Http\Livewire\Admin\PageTransaksiPesanan;
use App\Http\Livewire\Customer\DashboardCustomer;
use App\Http\Livewire\Supplier\DashboardSupplier;
use App\Http\Livewire\Supplier\PageBahanBaku;

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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'cekUser'])->name('dashboard');

      // AKses Admin
      Route::group(['middleware' => 'role:Admin', 'prefix' => 'admin', 'as' => 'Admin.'], function () {
        Route::get('Dashboard', DashboardAdmin::class)->name('Dashboard-Admin');

        Route::get('BarangKeluar', PageBarangKeluar::class)->name('Barang-Keluar');

        Route::get('BarangMasuk', PageBarangMasuk::class)->name('Barang-Masuk');

        Route::get('Stock/Bahan-Baku', PageStockBahanBaku::class)->name('Stock-Bahan-Baku');

        // Route Pesanan
        Route::get('Pesanan', PageTransaksiPesanan::class)->name('Tr-Pesanan');
        Route::get('Buat/Pesanan', PageBuatPesanan::class)->name('Buat-Pesanan');

        // Satuan Jenis Kelas Bahan Baku
        Route::get('Satuan', PageSatuan::class)->name('Satuan');
        Route::get('Jenis', PageJenis::class)->name('Jenis');
        Route::get('BahanBaku', PagelistBahanBaku::class)->name('List-BahanBaku');
        Route::get('Supplier', PageSupplier::class)->name('Supplier');
        Route::get('Customer' ,PageCustomer::class)->name('Customer');

        // Produk
        Route::get('Produk', PageProduk::class)->name('Produk');
        Route::get('Produk-Fermentasi', PageProdukFermentasi::class)->name('Produk-Fermentasi');
        Route::get('Buat-Fermentasi', CrudFermentasi::class)->name('Crud-Fermentasi');
        Route::post('create', [FermentasiController::class,'create'])->name('Fermentasi-Create');
        Route::put('edit/{id}', [FermentasiController::class,'edit'])->name('Fermentasi-edit');
        // Route::controller(FermentasiController::class)->group( ['prefix'=> 'Produk'] ,function(){
        // });

        // End Admin Route

    });
    Route::group(['middleware' => 'role:Supplier', 'prefix' => 'Supplier', 'as' => 'Supplier.'], function () {
        Route::get('Dashboard', DashboardSupplier::class)->name('Dashboard-Supplier');
        Route::get('Bahan-Baku', PageBahanBaku::class)->name('Bahan-Baku');
    });
    Route::group(['middleware' => 'role:Customer', 'prefix' => 'Customer', 'as' => 'Customer.'], function () {
        Route::get('Dashboard', DashboardCustomer::class)->name('Dashboard-Admin');
    });
    Route::get('Tabel-Bank', PageBank::class)->name('Page-Bank');
});

