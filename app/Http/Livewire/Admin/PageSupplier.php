<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Supplier;
use RealRashid\SweetAlert\Facades\Alert;

class PageSupplier extends Component
{
    public $nama_supplier,$alamat,$no_telpon;
    public $itemEdit = false, $itemDelete = false, $itemID;
    public function render()
    {
        $supplier = Supplier::all();
        return view('livewire.admin.page-supplier', ['supplier'=> $supplier])->layoutData(['page'=> 'Halaman Supplier']);
    }

    public function editModal($id){
        $supplier = Supplier::find($id);
        $this->itemID = $id;
        $this->nama_supplier = $supplier->supplier;
        $this->alamat = $supplier->user->alamat;
        $this->no_telpon = $supplier->user->no_telpon;
        $this->itemEdit = true;
    }
    public function edit($id){
        $this->validate([
            'nama_supplier'=> ['required', 'string'],
            'alamat'=> ['required', 'string'],
            'no_telpon'=> ['required', 'numeric'],
           ]);
        $supplier = Supplier::find($id);
        $user = User::find($supplier->user_id)->update([
            'name'=> $this->nama_supplier,
            'alamat'=> $this->alamat,
            'no_telpon'=> $this->no_telpon,
        ]);
        $supplier->update([
            'supplier'=> $this->nama_supplier,
        ]);
        $this->itemEdit = false;
        Alert::info("Info", 'Berhasil Di Edit..!!');
    }
    public function deleteModal($id){

    }
}
