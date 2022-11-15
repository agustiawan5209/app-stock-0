<?php

namespace App\Http\Livewire\Laporan;

use App\Models\BarangMasuk;
use Livewire\Component;

class LaporanBarangMasuk extends Component
{
    public $tgl_awal,$tgl_akhir, $cetak = false;
    public function render()
    {
        $barangmasuk = BarangMasuk::all();
        if($this->cetak == true){
            $barangmasuk = BarangMasuk::with(['pesanan', 'pesanan.transaksi'])
            ->whereHas('pesanan', function($query){
                return $query->whereHas('transaksi', function($query){
                    return $query->whereBetween('tgl_transaksi', [$this->tgl_awal, $this->tgl_akhir]);
                });
            })
            ->get();
        }
        return view('livewire.laporan.laporan-barang-masuk', [
            'barangmasuk'=> $barangmasuk,
        ])
        ->layoutData(['page'=> 'Laporan Stok Bahan Baku']);

    }

    public function cetakAl(){
        $this->validate([
            'tgl_awal'=> ['required', 'date'],
            'tgl_akhir'=> ['required', 'date'],
        ]);
        $this->cetak = true;
    }

}