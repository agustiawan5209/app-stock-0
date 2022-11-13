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
        $barang = BarangMasuk::find($this->itemID);
        return view('livewire.detail-pesanan', [
            'barangmasuks'=> $barang,
        ])->layoutData(['page'=> 'Detail Pesanan ']);
    }
}
