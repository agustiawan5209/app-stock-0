<?php

namespace App\Http\Livewire\Customer;

use App\Models\Status;
use Livewire\Component;
use App\Models\PesananUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PagePesan extends Component
{
    public $search = '', $row = 10;
    public $transaksi_id, $jumlah, $sub_total, $status, $ket;
    public $jenis, $itemStatus = false, $itemDelete = false, $itemID;
    public function mount(Request $request){
        $this->jenis = $request->jenis;
    }
    public function render()
    {
        // Jenis
        if($this->jenis == "Diterima"){
            $item = ['5'];
        }
        if($this->jenis == "BDiterima"){
            $item = ['1','2','3' ,'4'];
        }
        $pesan = PesananUser::whereIn('status', $item)
        ->where('user_id', Auth::user()->id)
        ->latest()->paginate($this->row);
        return view('livewire.customer.page-pesan', compact('pesan'))
        ->layout('components.layout.customer')
        ->layoutData(['page'=> 'Dashboard ']);
    }

    public function statusModal($id){
        $this->itemID = $id;
        $pesan = PesananUser::find($id);
        $this->status = $pesan->status;
        $this->itemStatus = true;
    }
    public function updateStatus($id){
        $barang = PesananUser::find($id);
        // dd($this->status);
        $barang->where('status', '4')
        ->update([
            'status'=> '5',
        ]);
        $status = Status::create([
            'pesanan_id'=> $barang->id,
            'jenis'=> '2',
            'status'=> '5',
            'ket'=> $this->ket,
        ]);
        Alert::success('Berhasil', "Konfirmasi Pesanan Berhasil!!!");
        $this->itemStatus = false;
    }

    public function deleteModal($id){
        $pesan = PesananUser::find($id);
        if($pesan->status > 1){
            Alert::error("Maaf!", 'Pesanan Tidak Bisa Dibatalkan');
        }else{
            $pesan->delete();
        }
    }


}
