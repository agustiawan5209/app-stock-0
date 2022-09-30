<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Customer;

class PageCustomer extends Component
{
    public function render()
    {
        $customer = Customer::all();
        return view('livewire.admin.page-customer', compact('customer'));
    }
}
