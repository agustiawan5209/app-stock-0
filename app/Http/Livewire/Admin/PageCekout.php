<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class PageCekout extends Component
{
    public function render()
    {
        return view('livewire.admin.page-cekout')->layoutData(['page'=> 'Cekout']);
    }
}
