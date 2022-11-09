<?php

namespace App\Http\Livewire\Admin;

use App\Models\PesananUser;
use Livewire\Component;

class PagePenjualan extends Component
{
    public $itemID , $itemDetail = false;
    // ItemTable
    public $user, $jenis,$jumlah,$sub_total, $status;
    public function render()
    {
        $pesanan = PesananUser::all();
        return view('livewire.admin.page-penjualan', [
            'pesan'=> $pesanan,
        ])
        ->layoutData(['page'=> 'Halaman Penjualan']);
    }
    public function detailModal($id){
        $this->itemDetail = true;
        $pesananUser = PesananUser::find($id);
        $this->user = $pesananUser->user;
        $this->jenis = $pesananUser->jenis;
        $this->jumlah = $pesananUser->jumlah;
        $this->sub_total = $pesananUser->sub_total;
        $this->status = $pesananUser->status;
    }
}
