<?php

namespace App\Http\Livewire\Admin;

use App\Models\StockBahanBaku;
use Livewire\Component;

class PageStockBahanBaku extends Component
{
    public function render()
    {
        $stockbahanbaku = StockBahanBaku::all();
        return view('livewire.admin.page-stock-bahan-baku', compact('stockbahanbaku'));
    }
}
