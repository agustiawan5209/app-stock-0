<?php

namespace App\Http\Livewire\Supplier;

use Livewire\Component;
use App\Http\Controllers\UserController;

class DashboardSupplier extends Component
{
    public function render()
    {
        $stok = new UserController;

        return view('livewire.supplier.dashboard-supplier', [
            'stok'=> $stok->cekStok(),
        ])->layoutData(['page'=> 'Dashboard']);
    }
}
