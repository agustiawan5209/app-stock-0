<?php

namespace App\Http\Livewire\Admin;

use App\Models\Status;
use Livewire\Component;
use App\Models\PesananUser;
use RealRashid\SweetAlert\Facades\Alert;

class PagePenjualan extends Component
{
    public $itemID , $itemDetail = false;
    // ItemTable
    public $itemStatus= false, $itemEdit = false, $statusItem,$ket;
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
    public function statusPesanan($id){
        $b = PesananUser::find($id)->status;
        $this->itemID = $id;
        $this->itemStatus = true;
        $this->statusItem =  $b;
    }
    public function updateStatus($id){
        $barang = PesananUser::find($id);
        // dd($this->status);
        $barang->update(['status'=> $this->status]);
        $status = Status::create([
            'pesanan_id'=> $barang->id,
            'jenis'=> '2',
            'status'=> $this->status,
            'ket'=> $this->ket,
        ]);
        Alert::success('Info', 'Berhasil Di Ganti...!!!');
        $this->itemStatus = false;
    }
}
