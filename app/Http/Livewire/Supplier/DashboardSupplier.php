<?php

namespace App\Http\Livewire\Supplier;

use App\Models\Pesanan;
use Livewire\Component;
use App\Models\StokProduk;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

class DashboardSupplier extends Component
{
    public function render()
    {
        $stok = new UserController;
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
            'stok'=> $stok->cekStok(),
            'total_produksi'=> $stok_produksi->jumlah_produksi,
            'total_penjualan'=> $total_penjualan,
            'pesan'=> $pesanan_terbaru,
            'sisa_produksi'=> $sisa_produksi,
        ])->layoutData(['page'=> 'Dashboard']);
    }
}
