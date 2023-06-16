<?php

namespace App\Http\Livewire\Customer;

use App\Models\Jenis;
use App\Models\StokProduk;
use Livewire\Component;

class PesanProduk extends Component
{
    public function render()
    {
        $jenis = Jenis::with(['stokproduk'])->get();
        $data = [];
        foreach ($jenis as $key => $value) {
            $data[] = StokProduk::where('jenis', $value->nama_jenis)->first();
        }
        return view('livewire.customer.pesan-produk',[
            'jenis'=> $jenis,
        ])
        ->layout('components.layout.customer')
        ->layoutData(['page'=> 'Dashboard ']);
    }
    public function Pesan($id){
        return redirect()->route('Customer.Cekout', ['item'=> $id]);
    }
}
