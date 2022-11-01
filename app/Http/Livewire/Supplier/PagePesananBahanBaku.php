<?php

namespace App\Http\Livewire\Supplier;

use App\Models\BahanBakuSupplier;
use App\Models\Status;
use Livewire\Component;
use App\Models\BarangMasuk;
use App\Models\StockBahanBaku;
use Illuminate\Support\Facades\Auth;

class PagePesananBahanBaku extends Component
{
    public $itemID, $itemStatus= false, $itemEdit = false, $statusItem;
    public $status, $ket;
    public function render()
    {
        $barang = BarangMasuk::where('supplier_id', Auth::user()->supplier->id)->get();
        return view('livewire.supplier.page-pesanan-bahan-baku', compact('barang'))->layoutData(['page'=> 'Pesanan Bahan Baku']);
    }
    public function statusPesanan($id){
        $b = BarangMasuk::find($id)->status;
        $this->itemID = $id;
        $this->itemStatus = true;
        $this->statusItem =  $b;
    }
    public function detailModal($id){
        return redirect()->route('Detail-Pesanan-Bahan-baku', ['item'=> $id]);
    }
    public function updateStatus($id){
        $barang = BarangMasuk::find($id);
        // dd($this->status);
        $this->createBarang($id,$this->status);
        $barang->update(['status'=> $this->status]);
        $status = Status::create([
            'pesanan_id'=> $barang->pesanan->id,
            'status'=> $this->status,
            'ket'=> $this->ket,
        ]);
        $this->itemStatus = false;
    }
    public function createBarang($id, $status){
        $barang = BarangMasuk::find($id);
        if($status == 4){
            $stock = StockBahanBaku::where('bahan_baku_id', '=', $barang->pesanan->bahanbaku->id)->first();
            $stock->update([
                'stock'=> $barang->pesanan->jumlah + $stock->stock,
            ]);
        }
    }
    public function kurangi($id, $status){
        $barang = BarangMasuk::find($id);
        if($status == 3){
            $stock = BahanBakuSupplier::where('bahan_baku_id', '=', $barang->pesanan->bahanbaku->id)->first();
            $stock->update([
                'stock'=> $barang->pesanan->jumlah - $stock->jumlah_stock,
            ]);
        }
    }
}
