<?php

namespace App\Http\Livewire\Admin;

use App\Models\BarangMasuk;
use App\Models\Pesanan;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class PageTransaksiPesanan extends Component
{
    public $row = 10, $search ='';
    public $itemDelete = false, $itemID;
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
    public function deleteModal($id){
        $pesanan = BarangMasuk::find($id);
        if($pesanan->status == 1){
            $this->itemDelete = true;
            $this->itemID = $id;
        }else{
            Alert::error('Pesanan Telah Dikonfirmasi', 'Pembatalan Tidak Dapat Dilakukan');
        }
    }
    public function delete($id){
        $barangmasuk = BarangMasuk::find($id);
        Pesanan::find($barangmasuk->pesanan->id)->delete();
        $barangmasuk->delete();

        $this->itemDelete = false;
        Alert::success("Info", 'Berhasil Di Hapus');
    }
}
