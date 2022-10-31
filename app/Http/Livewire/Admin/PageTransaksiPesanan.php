<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pesanan;
use Livewire\Component;

class PageTransaksiPesanan extends Component
{
    public $row = 10, $search ='';
    public function render()
    {
        $pesanan = Pesanan::with(['transaksi', 'bahanbaku'])
        ->orderBy('id', 'desc')->paginate($this->row);
        return view('livewire.admin.page-transaksi-pesanan', compact('pesanan'))->layoutData(['page'=> 'Halaman Transaksi Pemesanan']);
    }
    /**
     * buatPesanan
     *  Pindah Ke Halaman Buat Pesanan
     * @return void
     */
    public function addModal(){
        return redirect()->route('Admin.Buat-Pesanan');
    }
    public function detailModal($id){
        return redirect()->route('Detail-Pesanan-Bahan-baku', ['item'=> $id]);
    }
}
