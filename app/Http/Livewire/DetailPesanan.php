<?php

namespace App\Http\Livewire;

use App\Models\BarangMasuk;
use Livewire\Component;

class DetailPesanan extends Component
{
    public $itemID;
    public function mount($item){
        $this->itemID = $item;
    }
    public function render()
    {
        $barang = BarangMasuk::with(['pesanan'])->find($this->itemID);
        dd($barang);
        return view('livewire.detail-pesanan', [
            'barang'=> $barang,
        ])->layoutData(['page'=> 'Detail Pesanan ']);
    }
}
