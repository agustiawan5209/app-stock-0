<?php

namespace App\Http\Livewire\Admin;

use App\Models\Bank;
use Livewire\Component;
use Livewire\WithFileUploads;

class PageCekout extends Component
{
    use WithFileUploads;
    public $jumlah_barang, $sub_total = 0;
    public function mount(){
        if(session()->has('data') == false){
            abort(401);
        }
    }
    public function render()
    {
        $data = session('data');
        // dd($data);
        $bank = Bank::where('user_id', $data['user_id'] )->get();
        return view('livewire.admin.page-cekout', compact('data', 'bank'))->layout('components.admin.layout');
    }
    public function hitungTotal(){
        $data = session('data');
        $this->sub_total =   $this->jumlah_barang * $data['harga'];
    }
}
