<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Customer;
use RealRashid\SweetAlert\Facades\Alert;

class PageCustomer extends Component
{
    public $nama_customer,$alamat,$no_telpon;
    public $itemEdit = false, $itemDelete = false, $itemID;
    public function render()
    {
        $customer = Customer::all();
        return view('livewire.admin.page-customer', compact('customer'))->layoutData(['page'=> 'Halaman Customer']);
    }
    public function editModal($id){
        $customer = Customer::find($id);
        $this->itemID = $id;
        $this->nama_customer = $customer->customer;
        $this->alamat = $customer->user->alamat;
        $this->no_telpon = $customer->user->no_telpon;
        $this->itemEdit = true;
    }
    public function edit($id){
        $this->validate([
            'nama_customer'=> ['required', 'string'],
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
        $this->itemEdit = false;
        Alert::info("Info", 'Berhasil Di Edit..!!');
    }
    public function deleteModal($id){

    }
}
