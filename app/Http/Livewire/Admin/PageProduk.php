<?php

namespace App\Http\Livewire\Admin;

use App\Models\Jenis;
use App\Models\Produk;
use App\Models\ProdukFermentasi;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class PageProduk extends Component
{
    public $kode,
        $kode_fermentasi,
        $jumlah,
        $status = 1,
        $tgl_kadaluarsa,
        $jenis_id,
        $itemAdd = false,
        $itemEdit = false,
        $itemDelete = false,
        $itemID;

    public function kode()
    {
        $produk = Produk::latest()->first();
        if ($produk == null) {
            $kode = 'KD-001';
        } else {
            $huruf = 'KD-';
            $kod = substr($produk->kode, 3, 3);
            $kod++;
            $kode = $huruf . sprintf('%03s', $kod);
        }
        $this->kode = $kode;
    }
    public function getProduk()
    {
        $produk = ProdukFermentasi::where('status', '=', '2')->get();
        return $produk;
    }
    public function render()
    {
        $produk = Produk::all();
        $jenis = Jenis::all();
        $fermentasi = $this->getProduk();
        return view('livewire.admin.page-produk', compact('produk', 'jenis', 'fermentasi'))->layoutData(['page' => 'Halaman Produk Siap Jual']);
    }
    public function getJumlah()
    {
        if ($this->kode_fermentasi != null) {
            $produk = ProdukFermentasi::find($this->kode_fermentasi);
            $this->jumlah = $produk->jumlah_stock;
        }
    }
    // Modal
    public function closeModal()
    {
        $this->kode = null;
        $this->kode_fermentasi = null;
        $this->jumlah = null;
        $this->status = null;
        $this->tgl_kadaluarsa = null;
        $this->jenis_id = null;
        $this->itemAdd = false;
        $this->itemEdit = false;
        $this->itemDelete = false;
    }
    public function addModal()
    {
        $this->kode();
        // Alert::info('Info Title', 'Info Message');
        $this->itemAdd = true;
    }
    public function editModal($id)
    {
        $satuan = Produk::find($id);
        // dd($satuan);
        $this->kode_fermentasi = $satuan->kode_fermentasi;
        $this->kode = $satuan->kode;
        $this->jumlah = $satuan->jumlah;
        $this->status = $satuan->status;
        $this->tgl_kadaluarsa = $satuan->tgl_kadaluarsa;
        $this->jenis_id = $satuan->jenis_id;
        $this->itemID = $satuan->id;
        $this->itemEdit = true;
    }
    public function deleteModal($id)
    {
        $satuan = Produk::find($id);
        $this->itemID = $satuan->id;
        $this->itemDelete = true;
    }

    // Crud
    public function create()
    {
        Produk::create([
            'kode' => $this->kode,
            'kode_fermentasi' => $this->kode_fermentasi,
            'jumlah' => $this->jumlah,
            'status' => '1',
            'tgl_kadaluarsa' => $this->tgl_kadaluarsa,
            'jenis_id' => $this->jenis_id,
        ]);
        $this->itemAdd = false;
        Alert::info('Info', 'Berhasil Di Simpan');
    }
    public function edit($id)
    {
        Produk::where('id', $id)->update([
            'kode' => $this->kode,
            'jumlah' => $this->jumlah,
            'status' => $this->status,
            'tgl_kadaluarsa' => $this->tgl_kadaluarsa,
            'jenis_id' => $this->jenis_id,
        ]);
        $this->itemEdit = false;
        Alert::info('Info', 'Berhasil Di Update');
    }
    public function delete($id)
    {
        Produk::find($id)->delete();
        $this->itemDelete = false;
        Alert::warning('Pesan', 'Berhasil Dihapus');
    }
}
