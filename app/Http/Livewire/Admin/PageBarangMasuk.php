<?php

namespace App\Http\Livewire\Admin;

use App\Models\BarangMasuk;
use Livewire\Component;

class PageBarangMasuk extends Component
{
    public $row = 10, $search ='';
    public function render()
    {
        $barangmasuk = BarangMasuk::orderBy('id', 'desc')->paginate($this->row);
        if($this->search != ''){
            $barangmasuk = BarangMasuk::orderBy('id', 'desc')
            ->where('kode', 'like', '%'. $this->search . '%')
            ->paginate($this->row);
        }
        return view('livewire.admin.page-barang-masuk', compact('barangmasuk'));
    }
}
