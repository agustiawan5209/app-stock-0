<?php

namespace App\Http\Livewire\Laporan;

use App\Models\PesananUser;
use Livewire\Component;

class LaporanPenjualan extends Component
{
    public $tgl_awal,$tgl_akhir, $cetak = false;

    public function render()
    {
        $penjualan = PesananUser::all();
        if($this->cetak == true){
            $penjualan = PesananUser::where('status' , '=', 3)
            ->whereHas('transaksi', function($query){
                return $query->whereBetween('tgl_transaksi', [$this->tgl_awal, $this->tgl_akhir]);
            })
            ->get();
        }
        return view('livewire.laporan.laporan-penjualan', [
            'penjualan'=> $penjualan,
        ])
        ->layoutData(['page'=> 'Laporan Stok Bahan Baku']);

    }

    public function cetakAl()
    {
        $this->validate([
            'tgl_awal'=> ['required', 'date'],
            'tgl_akhir'=> ['required', 'date'],
        ]);
        $this->cetak = true;
    }
}
