<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Customer;
use RealRashid\SweetAlert\Facades\Alert;

class PageCustomer extends Component
{
    public $nama_customer,$alamat,$no_telpon, $email, $password;
    public $itemEdit = false, $itemDelete = false, $itemID, $addItem = false;
    public function render()
    {
        $customer = Customer::all();
        return view('livewire.admin.page-customer', compact('customer'))->layoutData(['page'=> 'Halaman Customer']);
    }
    public function clear(){
        $this->addItem = false;
        $this->itemDelete = false;
        $this->itemEdit = false;
        $this->nama_customer = '';
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
            'nama_customer'=> ['required', 'string'],
            'alamat'=> ['required', 'string'],
            'no_telpon'=> ['required', 'numeric'],
            'email'=> ['required', 'email'],
            'password'=> ['required']
           ]);
        $customer = User::create([
            'name'=> $this->nama_customer,
            'email'=> $this->email,
            'alamat'=> $this->alamat,
            'no_telpon'=> $this->no_telpon,
            'password'=> $this->password,
            'role_id'=> '2',
        ]);
        Customer::create([
            'customer'=> $customer->name,
            'user_id'=> $customer->id,
        ]);
        Alert::info("Info", 'Berhasil Di Tambah..!!');

        $this->clear();
    }
    public function editModal($id){
        $customer = Customer::find($id);
        $this->itemID = $id;
        $this->nama_customer = $customer->customer;
        $this->alamat = $customer->user->alamat;
        $this->no_telpon = $customer->user->no_telpon;
        $this->email = $customer->user->email;
        $this->password = $customer->user->password;
        $this->addItem = true;
        $this->itemEdit = true;
    }
    public function edit($id){
        $this->validate([
            'nama_customer'=> ['required', 'string', 'exists:customers,customer'],
            'alamat'=> ['required', 'string'],
            'no_telpon'=> ['required', 'numeric'],
           ]);
        $customer = Customer::find($id);
        $user = User::find($customer->user_id)->update([
            'name'=> $this->nama_customer,
            'alamat'=> $this->alamat,
            'no_telpon'=> $this->no_telpon,
        ]);
        $customer->update([
            'customer'=> $this->nama_customer,
        ]);
        $this->clear();

        Alert::info("Info", 'Berhasil Di Edit..!!');
    }
    public function deleteModal($id){
        $this->itemDelete = true;
        $this->itemID =$id;
    }
    public function delete($id){
        $customer = Customer::find($id);
        User::find($customer->user_id)->delete();
        $customer->delete();
        Alert::error("Info", 'Berhasil Di Hapus');
        $this->clear();
    }
}
