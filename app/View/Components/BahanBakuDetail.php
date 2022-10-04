<?php

namespace App\View\Components;

use App\Models\BahanBakuSupplier;
use Illuminate\View\Component;

class BahanBakuDetail extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $bahan = BahanBakuSupplier::find($this->id);
        return view('components.bahan-baku-detail', compact('bahan'));
    }
}
