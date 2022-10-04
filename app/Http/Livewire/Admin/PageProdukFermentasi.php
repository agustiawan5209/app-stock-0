<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProdukFermentasi;
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
    public function render()
    {
        $produk = ProdukFermentasi::all();
        return view('livewire.admin.page-produk-fermentasi' ,compact('produk'));
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
}
