<?php

namespace App\Http\Livewire\Admin;

use App\Http\Controllers\UserController;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Pesanan;
use App\Models\StockBahanBaku;
use App\Models\StockBahanBakuKemasan;
use App\Models\StokProduk;
use Livewire\Component;

class DashboardAdmin extends Component
{
    public function render()
    {
        $stok = new UserController;
        // dd($stok);
        $stok_kemasan = StockBahanBakuKemasan::sum('stock');
        $stok_markisa = StockBahanBaku::sum('stock');
        $total_produk = StokProduk::latest()->first();
        $total_penjualan = BarangKeluar::sum('sub_total');
        $total_pembelian = Pesanan::whereHas('barangmasuk', function($query){
            return $query->where('status', '=', '5');
        })->sum('sub_total');
        return view('livewire.admin.dashboard-admin', [
            'stok'=> $stok->cekStok(),
            'total_produksi'=> $total_produk->jumlah_produksi,
            'stok_kemasan'=> $stok_kemasan,
            'stok_markisa'=> $stok_markisa,
            'total_penjualan'=> $total_penjualan,
            'total_pembelian'=> $total_pembelian,
        ])->layoutData(['page'=> 'Dashboard']);
    }
}
