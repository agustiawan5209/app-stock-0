<?php

namespace App\Http\Livewire\Customer;

use App\Models\Bank;
use App\Models\Cart;
use App\Models\Jenis;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class Keranjang extends Component
{
    public function render()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        $total = 0;

        foreach ($cart as $item) {
            $total += $item->jumlah * $item->harga;
        }
        // dd($jenis);
        $bank = Bank::whereHas('user', function($query){
            return $query->where('role_id', '1');
        })->get();
        return view('livewire.customer.keranjang',[
            'cart'=> $cart,
            'total'=> $total,
            'bank'=>$bank,

        ])
        ->layout('components.layout.customer')
        ->layoutData(['page'=> 'Dashboard ']);
    }

    public function hapus($item){
        $cart = Cart::find($item)->delete();
        Alert::success('info', 'Berhasil Dihapus');
    }

}
