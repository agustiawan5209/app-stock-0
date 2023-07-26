<?php

namespace App\Http\Livewire\Customer;

use App\Models\Cart;
use App\Models\Jenis;
use Livewire\Component;
use App\Models\StokProduk;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PesanProduk extends Component
{
    public $modalCart = false;
    public $countCart = 0;
    public $itemCart = null;
    public $stok = 0;
    public function render()
    {
        $jenis = Jenis::with(['stokproduk'])->get();
        $data = [];
        foreach ($jenis as $key => $value) {
            $data[] = StokProduk::where('jenis', $value->nama_jenis)->first();
        }
        return view('livewire.customer.pesan-produk', [
            'jenis' => $jenis,
        ])
            ->layout('components.layout.customer')
            ->layoutData(['page' => 'Dashboard ']);
    }
    public function Pesan($id)
    {
        return redirect()->route('Customer.Cekout', ['item' => $id]);
    }

    public function openCart($item, $jml)
    {
        $this->modalCart = true;
        $this->itemCart = $item;
        $this->stok = $jml;
    }
    public function closeModal()
    {
        $this->modalCart = false;
        $this->countCart = 0;
        $this->itemCart = null;
    }

    public function countCartPlus()
    {
        if ($this->countCart < $this->stok) {
            $this->countCart++;
        }
    }

    public function countCartMinus()
    {
        if ($this->countCart > 0) {
            $this->countCart--;
        }
    }

    public function Keranjang()
    {
        if ($this->countCart < 1) {
            Alert::error('Gagal', 'Jumlah Barang Kosong');
        } else {
            $item = Jenis::find($this->itemCart);
            $cart = Cart::where('user_id', Auth::user()->id)->where('jenis_id', $item->id)->get();
            if ($cart->count() > 0) {
                Cart::where('user_id', Auth::user()->id)->where('jenis_id', $item->id)->update(['jumlah' => $this->countCart]);
            } else {
                $cart = Cart::create([
                    'jenis_id' => $item->id,
                    'user_id' => Auth::user()->id,
                    'nama' => $item->nama_jenis,
                    'jumlah' => $this->countCart,
                    'harga' => $item->harga,
                ]);
            }
            Alert::success('Berhasil', 'JBerhasil Di Masukkan');

        }
        return redirect()->route('Customer.keranjang');
    }
}
