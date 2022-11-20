<?php

namespace App\Http\Livewire\Admin;

use App\Models\BahanBaku;
use Livewire\Component;
use App\Models\BarangMasuk;
use RealRashid\SweetAlert\Facades\Alert;

class PageBarangMasuk extends Component
{
    public $row = 10, $search ='';
    public function render()
    {
        $barangmasuk = BarangMasuk::where('status', '=', '4')
        ->orderBy('id', 'desc')->get();
        dd($barangmasuk);
        $bahan = BahanBaku::all();
        return view('livewire.admin.page-barang-masuk', compact('barangmasuk','bahan'))->layoutData(['page'=> 'Halaman Barang Masuk']);
    }
    public $itemAdd = false , $itemEdit = false, $itemDelete = false , $itemID;

    public function addModal(){
        $this->itemAdd = true;

    }
    public function editModal($id){
        $this->itemID = $id;
        $this->itemEdit = true;
    }
    public function deleteModal($id){
        $this->itemID = $id;
        $this->itemDelete = true;
    }
}
