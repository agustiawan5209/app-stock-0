<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Supplier;
use RealRashid\SweetAlert\Facades\Alert;

class PageSupplier extends Component
{
    public $nama_supplier,$alamat,$no_telpon, $email, $password;
    public $itemEdit = false, $itemDelete = false, $itemID, $addItem = false;
    public function render()
    {
        $supplier = Supplier::all();
        return view('livewire.admin.page-supplier', ['supplier'=> $supplier])->layoutData(['page'=> 'Halaman Supplier']);
    }
    public function clear(){
        $this->addItem = false;
        $this->itemDelete = false;
        $this->itemEdit = false;
        $this->nama_supplier = '';
        $this->itemID = '';
        $this->alamat = '';
        $this->email = '';
        $this->password = '';
        $this->no_telpon = '';
    }

    public function addModal(){
        $this->addItem = true;
    }
    public function create(){
        $this->validate([
            'nama_supplier'=> ['required', 'string'],
            'alamat'=> ['required', 'string'],
            'no_telpon'=> ['required', 'numeric'],
            'email'=> ['required', 'email'],
            'password'=> ['required']
           ]);
        $supplier = User::create([
            'name'=> $this->nama_supplier,
            'email'=> $this->email,
            'alamat'=> $this->alamat,
            'no_telpon'=> $this->no_telpon,
            'password'=> bcrypt($this->password),
            'role_id'=> '2',
        ]);
        Supplier::create([
            'supplier'=> $supplier->name,
            'user_id'=> $supplier->id,
        ]);
        Alert::info("Info", 'Berhasil Di Tambah..!!');

        $this->clear();
    }
    public function editModal($id){
        $supplier = Supplier::find($id);
        $this->itemID = $id;
        $this->nama_supplier = $supplier->supplier;
        $this->alamat = $supplier->user->alamat;
        $this->no_telpon = $supplier->user->no_telpon;
        $this->email = $supplier->user->email;
        $this->password = $supplier->user->password;
        $this->addItem = true;
        $this->itemEdit = true;
    }
    public function edit($id){
        $this->validate([
            'nama_supplier'=> ['required', 'string', 'exists:suppliers,supplier'],
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
        $this->clear();

        Alert::info("Info", 'Berhasil Di Edit..!!');
    }
    public function deleteModal($id){
        $this->itemDelete = true;
        $this->itemID =$id;
    }
    public function delete($id){
        $supplier = Supplier::find($id);
        User::find($supplier->user_id)->delete();
        $supplier->delete();
        Alert::error("Info", 'Berhasil Di Hapus');
        $this->clear();
    }
}
