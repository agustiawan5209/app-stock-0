<?php

namespace App\Http\Livewire\Admin;

use App\Models\BahanBakuSupplier;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class PageBuatPesanan extends Component
{
    public $gambar, $bahan_baku, $satuan, $isi, $harga, $jumlah_stock, $supplier_id;

    public $total, $sub_total;
    public function render()
    {
        $bahanbaku = BahanBakuSupplier::latest()->paginate(10);
        return view('livewire.admin.page-buat-pesanan', [
            'bahanbaku'=> $bahanbaku,
        ])->layoutData(['page'=> 'Halaman Buat Pesanan']);
    }
    public $itemAdd = false , $itemEdit = false, $itemDelete = false , $itemID;

    public function CloseModal(){

        $this->itemEdit = false;
        $this->itemID = null;
        $this->itemAdd = false;
        $this->itemDelete = false;
        $this->gambar = null;
        $this->bahan_baku = null;
        $this->satuan = null;
        $this->isi =null;
        $this->harga = null;
        $this->jumlah_stock = null;
        $this->supplier_id = null;
    }
    public function addModal($id){

        $this->itemAdd = true;
        $bahanBaku = BahanBakuSupplier::find($id);
        $this->itemID = $id;
        $this->gambar = $bahanBaku->gambar;
        $this->bahan_baku = $bahanBaku->bahan_baku;
        $this->satuan = $bahanBaku->satuan;
        $this->isi = $bahanBaku->isi;
        $this->harga = $bahanBaku->harga;
        $this->jumlah_stock = $bahanBaku->jumlah_stock;
        $this->supplier_id = $bahanBaku->supplier->supplier;
    }
    public function editModal($id){
        $this->itemID = $id;

        Alert::success("Info", "Berhasil Di Edit");
        $this->itemEdit = true;
    }
    public function kirimCekout($id){
        $this->itemID = $id;

        return redirect()->route('Admin.pesan-Cekout');
    }

}
