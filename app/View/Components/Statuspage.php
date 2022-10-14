<?php

namespace App\View\Components;

use App\Models\Status;
use Illuminate\View\Component;

class Statuspage extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $item;
    public function __construct($id)
    {
        $this->item = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $pesanan = Status::where('pesanan_id','=', $this->item)->latest()->get();
        return view('components.statuspage', compact('pesanan'));
    }
}
