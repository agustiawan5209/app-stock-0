<?php

namespace App\Http\Livewire\Admin;

use App\Models\BahanBakuSupplier;
use App\Models\Supplier;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class PageBuatPesanan extends Component
{
    public $gambar, $bahan_baku, $satuan, $isi, $harga, $jumlah_stock, $supplier_id;

    public $total, $sub_total;
    public function render()
    {
        $bahanbaku = BahanBakuSupplier::latest()->get();
        $supplier = Supplier::all();
        return view('livewire.admin.page-buat-pesanan', [
            'bahanbaku' => $bahanbaku,
            'supplier' => $supplier,
        ])->layoutData(['page' => 'Halaman Buat Pesanan']);
    }
    public $itemAdd = false, $itemEdit = false, $itemDelete = false, $itemID;

    public function CloseModal()
    {

        $this->itemEdit = false;
        $this->itemID = null;
        $this->itemAdd = false;
        $this->itemDelete = false;
        $this->gambar = null;
        $this->bahan_baku = null;
        $this->satuan = null;
        $this->isi = null;
        $this->harga = null;
        $this->jumlah_stock = null;
        $this->supplier_id = null;
    }
    public function addModal($id)
    {

        $bahanBaku = BahanBakuSupplier::find($id);
        $this->itemID = $id;
        $this->gambar = $bahanBaku->gambar;
        if ($bahanBaku->jenis == 1) {
            if ($bahanBaku->bahanbaku == null) {
                Alert::error("Maaf Pemesanan Gagal", 'Bahan Baku Tujuan Pemesanan Hilang');
            } else {
                $this->bahan_baku = $bahanBaku->bahanbaku->nama_bahan_baku;
                $this->itemAdd = true;
            }
        }
        if ($bahanBaku->jenis == 2) {
            if ($bahanBaku->bahanbakuKemasan == null) {
                Alert::error("Maaf Pemesanan Gagal", 'Bahan Baku Tujuan Pemesanan Hilang');
            } else {
                $this->bahan_baku = $bahanBaku->bahanbakuKemasan->nama_bahan_baku;
                $this->itemAdd = true;
            }
        }
        $this->satuan = $bahanBaku->satuan;
        $this->isi = $bahanBaku->isi;
        $this->harga = $bahanBaku->harga;
        $this->jumlah_stock = $bahanBaku->jumlah_stock;
        $this->supplier_id = $bahanBaku->supplier->supplier;
    }
    public function editModal($id)
    {
        $this->itemID = $id;

        Alert::success("Info", "Berhasil Di Edit");
        $this->itemEdit = true;
    }
    public function kirimCekout($id)
    {
        $this->itemID = $id;
        $bahanBaku = BahanBakuSupplier::find($id);
        $namabahanbaku = null;
        if ($bahanBaku->jenis == 1) {
            if ($bahanBaku->bahanbaku != null) {
                $namabahanbaku =  $bahanBaku->bahanbaku->nama_bahan_baku;
            }
        } elseif ($bahanBaku->jenis == 2) {
            if ($bahanBaku->bahanbakuKemasan != null) {
                $namabahanbaku =  $bahanBaku->bahanbakuKemasan->nama_bahan_baku;
            }
        }
        session()->put('data', [
            'itemID' => $bahanBaku->id,
            'gambar' => $bahanBaku->gambar,
            'bahan_baku' => $bahanBaku->bahan_baku,
            'nama_bahan_baku' => $namabahanbaku,
            'satuan' => $bahanBaku->satuan,
            'isi' => $bahanBaku->isi,
            'jenis' => $bahanBaku->jenis,
            'harga' => $bahanBaku->harga,
            'jumlah_stock' => $bahanBaku->jumlah_stock,
            'supplier_id' => $bahanBaku->suppliers_id,
            'user_id' => $bahanBaku->supplier->user_id,

        ]);
        return redirect()->route('Admin.pesan-Cekout');
    }
}
