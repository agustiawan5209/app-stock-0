<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class DashboardCustomer extends Component
{
    public function render()
    {
        return view('livewire.customer.dashboard-customer')
        ->layout('components.layout.customer')
        ->layoutData(['page'=> 'Dashboard ']);
    }
}
