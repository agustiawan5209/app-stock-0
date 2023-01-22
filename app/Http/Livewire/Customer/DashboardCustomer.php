<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\StokProduk;
use App\Models\PesananUser;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\ProdukFermentasi;

class DashboardCustomer extends Component
{
    public function render()
    {
        $stokProduk = StokProduk::latest()->first();
        $jumlah_pembelian = PesananUser::where('user_id', Auth::user()->id)->sum('sub_total');
        return view('livewire.customer.dashboard-customer',[
            'stok_produk'=> $stokProduk == null ?  0 : $stokProduk->jumlah_produksi,
            'pembelian'=> $jumlah_pembelian,
        ])
        ->layout('components.layout.customer')
        ->layoutData(['page'=> 'Dashboard ']);
    }
}
