<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class PageBuatPesanan extends Component
{
    public function render()
    {
        return view('livewire.admin.page-buat-pesanan');
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
