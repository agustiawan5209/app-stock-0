<?php

namespace App\Http\Livewire\Customer;

use App\Models\PesananUser;
use Illuminate\Http\Request;
use Livewire\Component;

class PagePesan extends Component
{
    public $search = '', $row = 10;
    public $transaksi_id, $jumlah, $sub_total, $status, $ket;
    public $jenis;
    public function mount(Request $request){
        $this->jenis = $request->jenis;
    }
    public function render()
    {
        // Jenis
        if($this->jenis == "Diterima"){
            $item = ['4','5'];
        }
        if($this->jenis == "BDiterima"){
            $item = ['1','2','3'];
        }
        $pesan = PesananUser::whereIn('status', $item)->latest()->paginate($this->row);
        return view('livewire.customer.page-pesan', compact('pesan'))
        ->layout('components.layout.customer')
        ->layoutData(['page'=> 'Dashboard ']);
    }


}
