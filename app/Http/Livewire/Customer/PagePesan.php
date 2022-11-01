<?php

namespace App\Http\Livewire\Customer;

use App\Models\PesananUser;
use Livewire\Component;

class PagePesan extends Component
{
    public $search = '', $row = 10;
    public $transaksi_id, $jumlah, $sub_total, $status, $ket;
    public function render()
    {
        $pesan = PesananUser::latest()->paginate($this->row);
        return view('livewire.customer.page-pesan', compact('pesan'))
        ->layout('components.layout.customer')
        ->layoutData(['page'=> 'Dashboard ']);
    }

}
