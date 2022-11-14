<?php

namespace App\Http\Livewire\Admin;

use App\Http\Controllers\UserController;
use Livewire\Component;

class DashboardAdmin extends Component
{
    public function render()
    {
        $stok = new UserController;
        // dd($stok);
        return view('livewire.admin.dashboard-admin', [
            'stok'=> $stok->cekStok(),
        ])->layoutData(['page'=> 'Dashboard']);
    }
}
