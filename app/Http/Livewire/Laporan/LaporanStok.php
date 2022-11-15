<?php

namespace App\Http\Livewire\Laporan;

use App\Models\StockBahanBaku;
use App\Models\StockBahanBakuKemasan;
use Livewire\Component;

class LaporanStok extends Component
{
    public $tgl_awal, $tgl_akhir;
    public function render()
    {
        $data['produksi']= StockBahanBaku::all();
        $data['kemasan']= StockBahanBakuKemasan::all();
        return view('livewire.laporan.laporan-stok', [
            'data'=> $data,
        ])
        ->layoutData(['page'=> 'Laporan Stok Bahan Baku']);
    }
}
