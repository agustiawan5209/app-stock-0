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
    public $item, $jenis;
    public function __construct($id, $jenis = 1)
    {
        $this->item = $id;
        $this->jenis = $jenis;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $jns = $this->jenis;
        $pesanan = Status::where('jenis', '=', $this->jenis)
        ->where('pesanan_id','=', $this->item)
        ->latest()->get();
        return view('components.statuspage', compact('pesanan'));
    }
}
