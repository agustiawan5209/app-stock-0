<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pesanan;
use Livewire\Component;

class PageTransaksiPesanan extends Component
{
    public $row = 10, $search ='';
    public function render()
    {
        $pesanan = Pesanan::orderBy('id', 'desc')->paginate($this->row);
        return view('livewire.admin.page-transaksi-pesanan', compact('pesanan'));
    }
    public function buatPesanan(){
        return redirect()->route('Admin.Buat-Pesanan');
    }
}
