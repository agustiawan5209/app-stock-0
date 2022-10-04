<?php

namespace App\Http\Livewire\Admin;

use App\Models\Supplier;
use Livewire\Component;

class PageSupplier extends Component
{
    public function render()
    {
        $supplier = Supplier::all();
        return view('livewire.admin.page-supplier', ['supplier'=> $supplier])->layoutData(['page'=> 'Halaman Supplier']);
    }
}
