<?php

namespace App\Http\Livewire\Supplier;

use App\Models\Pesanan;
use Livewire\Component;
use App\Models\StokProduk;
use App\Models\StockBahanBaku;
use Illuminate\Support\Facades\Auth;
use App\Models\StockBahanBakuKemasan;
use App\Http\Controllers\UserController;

class DashboardSupplier extends Component
{
    public function render()
    {
        $stok =[];
        $stok['produksi'] = StockBahanBaku::with(['bahanbaku','jenis','satuan'])->where('stock', '>', '50')->get();
        $stok['kemasan'] = StockBahanBakuKemasan::with(['bahanbaku','jenis','satuan'])->where('stock', '<', '50')->get();
        // dd($stok);
        $stok_produksi = StokProduk::latest()->first();
        $total_penjualan = Pesanan::whereHas('bahanbakuSupplier', function($query){
            return $query->where("suppliers_id", Auth::user()->supplier->id);
        })->sum('sub_total');
        $pesanan_terbaru = Pesanan::whereHas('bahanbakuSupplier', function($query){
            return $query->where("suppliers_id", Auth::user()->supplier->id);
        })
        ->whereHas('barangmasuk', function($query){
            return $query->where("status",1);
        })
        ->count();
        $sisa_produksi = StokProduk::latest()->first();
        return view('livewire.supplier.dashboard-supplier', [
            'stok'=> $stok,
            'total_produksi'=> $stok_produksi == null ? 0 : $stok_produksi->jumlah_produksi,
            'total_penjualan'=> $total_penjualan,
            'pesan'=> $pesanan_terbaru,
            'sisa_produksi'=> $sisa_produksi,
        ])->layoutData(['page'=> 'Dashboard']);
    }
}
