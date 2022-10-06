<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MetodePembayaran extends Component
{
    public function render()
    {
        return view('livewire.metode-pembayaran')->layoutData(['page'=> 'Metode Pembayaran']);
    }
}
