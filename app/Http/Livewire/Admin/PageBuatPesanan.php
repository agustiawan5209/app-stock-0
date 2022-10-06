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
        $bahanbaku = BahanBakuSupplier::paginate(10);
        return view('livewire.admin.page-buat-pesanan', [
            'bahanbaku'=> $bahanbaku,
        ])->layoutData(['page'=> 'Halaman Buat Pesanan']);
    }
    public $itemAdd = false , $itemEdit = false, $itemDelete = false , $itemID;

    public function addModal($id){

        $this->itemAdd = true;
        $bahanBaku = BahanBakuSupplier::find($id);
        $this->gambar = $bahanBaku->gambar;
        $this->bahan_baku = $bahanBaku->bahan_baku;
        $this->satuan = $bahanBaku->satuan;
        $this->isi = $bahanBaku->isi;
        $this->harga = $bahanBaku->harga;
        $this->jumlah_stock = $bahanBaku->jumlah_stock;
        $this->supplier_id = $bahanBaku->supplier_id;
    }
    public function editModal($id){
        $this->itemID = $id;

        Alert::success("Info", "Berhasil Di Edit");
        $this->itemEdit = true;
    }
    public function deleteModal($id){
        $this->itemID = $id;

        Alert::success("Info", "Berhasil Di Hapus");
        $this->itemDelete = true;
    }

}
