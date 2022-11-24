<?php

namespace App\Http\Livewire;

use App\Models\Bank;
use App\Models\Jenis;
use Livewire\Component;
use App\Models\StokProduk;
use App\Models\ProdukFermentasi;

class CheckOut extends Component
{
    public $item;
    // item table
    public $harga, $jenis_id, $sub_total, $nama, $jumlah_barang;
    public function mount($item){
        $this->item = $item;
    }
    public function render()
    {
        $jenis = Jenis::find($this->item);
        $bank = Bank::whereHas('user', function($query){
            return $query->where('role_id', '1');
        })->get();
        $stockProduk = StokProduk::latest()->first();
        $jumlah_produk_sisa = ProdukFermentasi::sum('jumlah_stock');
        return view('livewire.check-out' , compact('jenis', 'bank', 'stockProduk' ,'jumlah_produk_sisa'))
        ->layout('components.layout.customer')
        ->layoutData(['page'=> 'Detail Pesanan ']);
    }
    public function hitungTotal(){
        $jenis = Jenis::find($this->item);
        $this->sub_total =   $this->jumlah_barang * $jenis->harga;
    }
}
