<?php

namespace App\Http\Livewire\Customer;

use App\Models\Jenis;
use Livewire\Component;
use App\Models\StokProduk;
use App\Models\PesananUser;
use App\Models\ProdukFermentasi;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardCustomer extends Component
{
    public function render()
    {
        $stokProduk = StokProduk::latest()->first();
        $jumlah_pembelian = PesananUser::where('user_id', Auth::user()->id)->sum('sub_total');

        $jenis_produk = Jenis::all();
        $data = [];
        foreach ($jenis_produk as $key => $value) {
            $stok = StokProduk::where('jenis', $value->nama_jenis)->first();
            if($stok !== null){
                $data[] = StokProduk::where('jenis', $value->nama_jenis)->first();
            }
        }
        return view('livewire.customer.dashboard-customer',[
            'stok_produk'=> $stokProduk == null ?  0 : $stokProduk->jumlah_produksi,
            'pembelian'=> $jumlah_pembelian,
            'data'=> $data,
        ])
        ->layout('components.layout.customer')
        ->layoutData(['page'=> 'Dashboard ']);
    }
}
