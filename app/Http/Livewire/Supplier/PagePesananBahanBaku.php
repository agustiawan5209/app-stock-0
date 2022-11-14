<?php

namespace App\Http\Livewire\Supplier;

use App\Models\Status;
use Livewire\Component;
use App\Models\BarangMasuk;
use App\Models\StockBahanBaku;
use App\Models\BahanBakuSupplier;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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
        $b = BarangMasuk::find($id);
        $this->itemID = $id;
        $this->itemStatus = true;
        $this->statusItem =  $b->status;
    }
    public function detailModal($id){
        return redirect()->route('Detail-Pesanan-Bahan-baku', ['item'=> $id]);
    }
    public function updateStatus($id){
        $barang = BarangMasuk::find($id);
        // dd($this->status);
        $this->createBarang($id,$this->status);
        $this->kurangi($id,$this->status);
        $barang->update(['status'=> $this->status]);
        $status = Status::create([
            'pesanan_id'=> $barang->pesanan->id,
            'status'=> $this->status,
            'ket'=> $this->ket,
        ]);
        Alert::success('Info', 'Berhasil Di Ganti...!!!');
        $this->itemStatus = false;
    }
    /**
     * createBarang
     * Fungsi Membuat Stok Bahan Baku Tertambah
     * @param  mixed $id
     * @param  mixed $status
     * @return void
     */
    public function createBarang($id, $status){
        $barang = BarangMasuk::find($id);
        if($status == 4){
            $stock = StockBahanBaku::where('bahan_baku_id', '=', $barang->pesanan->bahanbaku->id)->first();
            $stock->update([
                'stock'=> $barang->pesanan->jumlah + $stock->stock,
            ]);
        }
    }
    /**
     * kurangi
     *  Bahan Baku Supplier Berkurang Jika Status == 3
     * @param  mixed $id
     * @param  mixed $status
     * @return void
     */
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
