<?php

namespace App\Http\Livewire\Admin;

use App\Models\PesananUser;
use Livewire\Component;

class PagePenjualan extends Component
{
    public function render()
    {
        $pesanan = PesananUser::all();
        return view('livewire.admin.page-penjualan', [
            'pesan'=> $pesanan,
        ])
        ->layoutData(['page'=> 'Halaman Penjualan']);
    }
}
