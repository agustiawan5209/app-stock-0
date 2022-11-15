<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;

class LaporanPenjualan extends Component
{
    public function render()
    {
        return view('livewire.laporan.laporan-penjualan')
        ->layoutData(['page'=> 'Laporan Stok Bahan Baku']);

    }
}
