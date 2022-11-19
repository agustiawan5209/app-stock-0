<?php

namespace App\Http\Livewire\Laporan;

use App\Models\BarangKeluar;
use Livewire\Component;

class LaporanBarangKeluar extends Component
{
    public $tgl_awal,$tgl_akhir, $cetak = false;

    public function render()
    {
        $barangkeluar = BarangKeluar::all();
        if($this->cetak == true){
            $barangkeluar = BarangKeluar::whereBetween('tgl_keluar', [$this->tgl_awal, $this->tgl_akhir])->get();
        }
        return view('livewire.laporan.laporan-barang-keluar', [
            'barangkeluar'=> $barangkeluar,
        ])
        ->layoutData(['page'=> 'Laporan Barang Keluar']);

    }
    public function cetakAl(){
        $this->validate([
            'tgl_awal'=> ['required', 'date'],
            'tgl_akhir'=> ['required', 'date'],
        ]);
        $this->cetak = true;
    }
}
