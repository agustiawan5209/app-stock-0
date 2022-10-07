<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProdukFermentasi;
use Carbon\Carbon;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class PageProdukFermentasi extends Component
{
    public $kode,
        $jumlah_stock,
        $status = 1,
        $tgl_frementasi,
        $itemAdd = false,
        $itemEdit = false,
        $itemDelete = false,
        $itemID;

    public function SelesaiFermentasi()
    {
        $produk = ProdukFermentasi::all();
        foreach($produk  as $produkfermentasi){
            $hari = $this->hitungFermentasi($produkfermentasi->tgl_frementasi);
            if($hari > "90"){
                ProdukFermentasi::where('id', $produkfermentasi->id)->update([
                    'status'=> '2',
                ]);
            }
        }
    }
    public function kode()
    {
        $produk = ProdukFermentasi::latest()->first();
        if ($produk == null) {
            $kode = 'PF-001';
        } else {
            $huruf = 'PF-';
            $kod = substr($produk->kode, 3, 3);
            $kod++;
            $kode = $huruf . sprintf('%03s', $kod);
        }
        $this->kode = $kode;
    }
    public function render()
    {
        $this->SelesaiFermentasi();
        $date = ProdukFermentasi::latest()->first();
        // dd($this->hitungFermentasi($date->tgl_frementasi));
        $produk = ProdukFermentasi::all();
        return view('livewire.admin.page-produk-fermentasi', compact('produk'))->layoutData(['page' => 'Halaman Produk Fermentasi']);
    }
    public function closeModal()
    {
        $this->kode = null;
        $this->jumlah_stock = null;
        $this->status = null;
        $this->tgl_frementasi = null;
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
        $satuan = ProdukFermentasi::find($id);
        // dd($satuan);
        $this->kode = $satuan->kode;
        $this->jumlah_stock = $satuan->jumlah_stock;
        $this->status = $satuan->status;
        $this->tgl_frementasi = $satuan->tgl_frementasi;
        $this->itemID = $satuan->id;
        $this->itemEdit = true;
    }
    public function deleteModal($id)
    {
        $satuan = ProdukFermentasi::find($id);
        $this->itemID = $satuan->id;
        $this->itemDelete = true;
    }

    // Crud
    public function create()
    {
        ProdukFermentasi::create([
            'kode' => $this->kode,
            'jumlah_stock' => $this->jumlah_stock,
            'status' => '1',
            'tgl_frementasi' => $this->tgl_frementasi,
        ]);
        $this->itemAdd = false;
        Alert::info('Info', 'Berhasil Di Simpan');
    }
    public function edit($id)
    {
        ProdukFermentasi::where('id', $id)->update([
            'kode' => $this->kode,
            'jumlah_stock' => $this->jumlah_stock,
            'status' => $this->status,
            'tgl_frementasi' => $this->tgl_frementasi,
        ]);
        $this->itemEdit = false;
        Alert::info('Info', 'Berhasil Di Update');
    }
    public function delete($id)
    {
        ProdukFermentasi::find($id)->delete();
        $this->itemDelete = false;
        Alert::warning('Pesan', 'Berhasil Dihapus');
    }

    public function hitungFermentasi($date)
    {
        $carbon = Carbon::now()->format('Y-m-d');
        $second = Carbon::createFromDate($date);

        return $second->diffInDays($carbon);
    }
}
