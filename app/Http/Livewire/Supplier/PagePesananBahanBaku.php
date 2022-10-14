<?php

namespace App\Http\Livewire\Supplier;

use Livewire\Component;
use App\Models\BarangMasuk;
use Illuminate\Support\Facades\Auth;

class PagePesananBahanBaku extends Component
{
    public function render()
    {
        $barang = BarangMasuk::where('supplier_id', Auth::user()->supplier->id)->get();
        return view('livewire.supplier.page-pesanan-bahan-baku', compact('barang'))->layoutData(['page'=> 'Pesanan Bahan Baku']);
    }
}
