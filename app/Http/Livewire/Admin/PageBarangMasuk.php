<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\BarangMasuk;
use RealRashid\SweetAlert\Facades\Alert;

class PageBarangMasuk extends Component
{
    public $row = 10, $search ='';
    public function render()
    {
        $barangmasuk = BarangMasuk::where('status', '=', 4)
        ->orderBy('id', 'desc')->paginate($this->row);
        if($this->search != ''){
            $barangmasuk = BarangMasuk::orderBy('id', 'desc')
            ->where('kode', 'like', '%'. $this->search . '%')
            ->paginate($this->row);
        }
        return view('livewire.admin.page-barang-masuk', compact('barangmasuk'))->layoutData(['page'=> 'Halaman Barang Masuk']);
    }
    public $itemAdd = false , $itemEdit = false, $itemDelete = false , $itemID;

    public function addModal(){
        $this->itemAdd = true;

        Alert::success("Info", "Berhasil Di Tambah");
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
