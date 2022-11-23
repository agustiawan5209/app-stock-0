<?php

namespace App\Http\Livewire\Admin;

use App\Models\Status;
use App\Models\Pesanan;
use Livewire\Component;
use App\Models\BarangMasuk;
use App\Models\StockBahanBaku;
use App\Models\StockBahanBakuKemasan;
use RealRashid\SweetAlert\Facades\Alert;

class PageTransaksiPesanan extends Component
{
    public $row = 10, $search ='';
    public $itemDelete = false;
    public $itemID, $itemStatus= false, $itemEdit = false, $statusItem;
    public $status, $ket;
    public function render()
    {
        $pesanan = Pesanan::with(['transaksi', 'bahanbaku'])
        ->orderBy('id', 'desc')->paginate($this->row);
        return view('livewire.admin.page-transaksi-pesanan', compact('pesanan'))->layoutData(['page'=> 'Halaman Transaksi Pemesanan']);
    }
    /**
     * buatPesanan
     *  Pindah Ke Halaman Buat Pesanan
     * @return void
     */
    public function addModal(){
        return redirect()->route('Admin.Buat-Pesanan');
    }
    public function detailModal($id){
        return redirect()->route('Detail-Pesanan-Bahan-baku', ['item'=> $id]);
    }
    public function deleteModal($id){
        $pesanan = BarangMasuk::find($id);
        if($pesanan->status == 1){
            $this->itemDelete = true;
            $this->itemID = $id;
        }else{
            Alert::error('Pesanan Telah Dikonfirmasi', 'Pembatalan Tidak Dapat Dilakukan');
        }
    }
    public function delete($id){
        $barangmasuk = BarangMasuk::find($id);
        Pesanan::find($barangmasuk->pesanan->id)->delete();
        $barangmasuk->delete();

        $this->itemDelete = false;
        Alert::success("Info", 'Berhasil Di Hapus');
    }

    // Update Status Pesanan
    public function statusPesanan($id){
        $b = BarangMasuk::find($id);
        $this->itemID = $id;
        $this->itemStatus = true;
        $this->statusItem =  $b->status;
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
        Alert::success('Info', 'Berhasil Di Ganti...!!!');
        $this->itemStatus = false;
    }
    public function createBarang($id, $status){
        $barang = BarangMasuk::find($id);
        if($status == 5){
            if($barang->pesanan->jenis == 1){
                $stock = StockBahanBaku::where('bahan_baku_id', '=', $barang->pesanan->bahan_baku_id)->first();
            }
            if($barang->pesanan->jenis == 2){
                $stock = StockBahanBakuKemasan::where('bahan_baku_id', '=', $barang->pesanan->bahan_baku_id)->first();
            }
            // dd($stock);
            $stock->update([
                'stock'=> $barang->pesanan->jumlah + $stock->stock,
            ]);
        }
    }
}
