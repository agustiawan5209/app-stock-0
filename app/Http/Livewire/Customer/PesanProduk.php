<?php

namespace App\Http\Livewire\Customer;

use App\Models\Jenis;
use Livewire\Component;

class PesanProduk extends Component
{
    public function render()
    {
        $jenis = Jenis::all();
        return view('livewire.customer.pesan-produk', compact('jenis'))
        ->layout('components.layout.customer')
        ->layoutData(['page'=> 'Dashboard ']);
    }
    public function Pesan($id){
        return redirect()->route('Customer.Cekout', ['item'=> $id]);
    }
}
