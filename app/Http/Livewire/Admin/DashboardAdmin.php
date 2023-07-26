<?php

namespace App\Http\Livewire\Admin;

use App\Http\Controllers\UserController;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Pesanan;
use App\Models\PesananUser;
use App\Models\StockBahanBaku;
use App\Models\StockBahanBakuKemasan;
use App\Models\StokProduk;
use Livewire\Component;

class DashboardAdmin extends Component
{
    public function render()
    {
        $stok =[];
        $stok['produksi'] = StockBahanBaku::with(['bahanbaku','jenis','satuan'])->where('stock', '<', '50')->orWhere('stock', '<', 50)->get();
        $stok['kemasan'] = StockBahanBakuKemasan::with(['bahanbaku','jenis','satuan'])->where('stock', '<', '50')->get();
        // dd($stok);
        $stok_kemasan = StockBahanBakuKemasan::sum('stock');
        $stok_markisa = StockBahanBaku::sum('stock');
        $total_produk = StokProduk::latest()->first();
        $total_penjualan = BarangKeluar::sum('sub_total');
        $total_pembelian = Pesanan::whereHas('barangmasuk', function($query){
            return $query->where('status', '=', '5');
        })->sum('sub_total');
        $total_penjualan_user = PesananUser::where('status', '5')->sum('sub_total');
        return view('livewire.admin.dashboard-admin', [
            'stok'=> $stok,
            'total_produksi'=> $total_produk !== null ? $total_produk->jumlah_produksi : 0,
            'stok_kemasan'=> $stok_kemasan,
            'stok_markisa'=> $stok_markisa,
            'total_penjualan'=> $total_penjualan,
            'total_pembelian'=> $total_pembelian,
            'total_penjualan_user'=> $total_penjualan_user,
        ])->layoutData(['page'=> 'Dashboard']);
    }
}
