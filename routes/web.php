<?php

use App\Http\Controllers\ChekoutCartController;
use App\Http\Livewire\CheckOut;
use App\Http\Livewire\DetailPesanan;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\PageJenis;
use App\Http\Livewire\Admin\PageCekout;
use App\Http\Livewire\Admin\PageProduk;
use App\Http\Livewire\Admin\PageSatuan;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TableController;
use App\Http\Livewire\Admin\PageCustomer;
use App\Http\Livewire\Admin\PageSupplier;
use App\Http\Livewire\Customer\PagePesan;
use App\Http\Livewire\Transaksi\PageBank;
use App\Http\Livewire\Admin\PagePenjualan;
use App\Http\Livewire\Laporan\LaporanStok;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PesananController;
use App\Http\Livewire\Admin\CrudFermentasi;
use App\Http\Livewire\Admin\DashboardAdmin;
use App\Http\Livewire\Customer\PesanProduk;
use App\Http\Livewire\Admin\PageBarangMasuk;
use App\Http\Livewire\Admin\PageBuatPesanan;
use App\Http\Livewire\Admin\PageBarangKeluar;
use App\Http\Livewire\Supplier\PageBahanBaku;
use App\Http\Controllers\FermentasiController;
use App\Http\Livewire\Admin\PagelistBahanBaku;
use App\Http\Livewire\Admin\PageStockBahanBaku;
use App\Http\Livewire\Laporan\LaporanPenjualan;
use App\Http\Livewire\Admin\PageBahanBakuKemasan;
use App\Http\Livewire\Admin\PageProdukFermentasi;
use App\Http\Livewire\Admin\PageTransaksiPesanan;
use App\Http\Livewire\Customer\DashboardCustomer;
use App\Http\Livewire\Laporan\LaporanBarangMasuk;
use App\Http\Livewire\Supplier\DashboardSupplier;
use App\Http\Livewire\Laporan\LaporanBarangKeluar;
use App\Http\Livewire\Supplier\PagePesananBahanBaku;
use App\Http\Livewire\Admin\PageStockBahanBakuKemasan;
use App\Http\Livewire\Admin\PageTahapPengemasan;
use App\Http\Livewire\Customer\Keranjang;

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
Route::get('/Sejarah', function () {
    return view('sejarah');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'cekUser'])->name('dashboard');

    // AKses Admin
    Route::group(['middleware' => 'role:Admin', 'prefix' => 'admin', 'as' => 'Admin.'], function () {
        Route::get('Dashboard', DashboardAdmin::class)->name('Dashboard-Admin');

        Route::get('BarangKeluar', PageBarangKeluar::class)->name('Barang-Keluar');

        Route::get('BarangMasuk', PageBarangMasuk::class)->name('Barang-Masuk');

        Route::get('Stock/Bahan-Baku', PageStockBahanBaku::class)->name('Stock-Bahan-Baku');
        Route::get('Stock/Bahan-Baku/Kemasan', PageStockBahanBakuKemasan::class)->name('Stock-Bahan-Baku-Kemasan');

        // Route Pesanan
        Route::get('Pesanan', PageTransaksiPesanan::class)->name('Tr-Pesanan');
        Route::get('Buat/Pesanan', PageBuatPesanan::class)->name('Buat-Pesanan');
        Route::get('Buat/Cekout', PageCekout::class)->name('pesan-Cekout');

        // Satuan Jenis Kelas Bahan Baku
        Route::get('Satuan', PageSatuan::class)->name('Satuan');
        Route::get('Jenis', PageJenis::class)->name('Jenis');
        Route::get('BahanBaku', PagelistBahanBaku::class)->name('List-BahanBaku');
        Route::get('BahanBaku/Kemasan', PageBahanBakuKemasan::class)->name('List-BahanBaku-Kemasan');
        Route::get('Supplier', PageSupplier::class)->name('Supplier');
        Route::get('Customer', PageCustomer::class)->name('Customer');

        // Produk
        Route::get('Tahap-Pengemasan', PageTahapPengemasan::class)->name('Tahap-Pengemasan');
        Route::get('Produk', PageProduk::class)->name('Produk');
        Route::get('Penjualan', PagePenjualan::class)->name('Penjualan');
        Route::get('Produk-SiapJual', PageProdukFermentasi::class)->name('Produk-Fermentasi');
        Route::get('Buat-Fermentasi', CrudFermentasi::class)->name('Crud-Fermentasi');
        Route::post('create', [FermentasiController::class, 'create'])->name('Fermentasi-Create');
        Route::put('edit/{id}', [FermentasiController::class, 'edit'])->name('Fermentasi-edit');
        // Route::controller(FermentasiController::class)->group( ['prefix'=> 'Produk'] ,function(){
        // });

        // End Admin Route
        // Laporan
        Route::group(['prefix'=> 'laporan', 'as'=> 'laporan'], function(){
            Route::get('Penjulan', LaporanPenjualan::class)->name('Penjualan');
            Route::get('barangmasuk', LaporanBarangMasuk::class)->name('barangmasuk');
            Route::get('barangkeluar', LaporanBarangKeluar::class)->name('barangkeluar');
            Route::get('stok', LaporanStok::class)->name('stok');

        });
        Route::group(['prefix'=> 'cetak', 'as'=> 'cetak'], function(){
            Route::get('Penjualan', [LaporanController::class, 'penjualan'])->name('penjualan');
            Route::get('barangmasuk', [LaporanController::class, 'barangmasuk'])->name('barangmasuk');
            Route::get('barangkeluar', [LaporanController::class, 'barangkeluar'])->name('barangkeluar');
            Route::get('stok', [LaporanController::class, 'stok'])->name('stok');
        });

    });
    Route::group(['middleware' => 'role:Supplier', 'prefix' => 'Supplier', 'as' => 'Supplier.'], function () {
        Route::get('Dashboard', DashboardSupplier::class)->name('Dashboard-Supplier');
        Route::get('Bahan-Baku', PageBahanBaku::class)->name('Bahan-Baku');
        Route::get('Pesanan/Bahan-Baku', PagePesananBahanBaku::class)->name('Pesanan-Bahan-baku');
    });
    Route::group(['middleware' => 'role:Customer', 'prefix' => 'Customer', 'as' => 'Customer.'], function () {
        Route::get('Dashboard', DashboardCustomer::class)->name('Dashboard-Admin');
        Route::get('Pesanan', PagePesan::class)->name('Pesan-Customer');
        Route::get('Pesan/Produk', PesanProduk::class)->name('Pesan-Produk');
        Route::get('CekOut/{item}', CheckOut::class)->name('Cekout');
        Route::get('keranjang', Keranjang::class)->name('keranjang');
        Route::post('post/keranjang', [ChekoutCartController::class, 'receiveUser'])->name('keranjang.post');
        Route::post('receive', [PesananController::class, 'receiveUser'])->name('Simpan-Pesanan');
    });
    Route::get('Tabel-Bank', PageBank::class)->name('Page-Bank');
    Route::get('Detail/Pesanan/Bahan-Baku/{item}', DetailPesanan::class)->name('Detail-Pesanan-Bahan-baku');
});

Route::post('receive', [PesananController::class, 'receive'])->name('Simpan-Pesanan');

Route::group(['prefix' => 'tabel', 'as' => 'tabel.'], function () {
    Route::controller(TableController::class)->group(function () {
        Route::get('Barang-Keluar', 'barangkeluar')->name('barang-keluar');
    });
});
