<?php

namespace App\Http\Livewire\Admin;

use App\Models\Jenis;
use App\Models\Satuan;
use Livewire\Component;
use App\Models\BahanBaku;
use App\Models\StockBahanBaku;
use RealRashid\SweetAlert\Facades\Alert;

class PageStockBahanBaku extends Component
{
    public $bahan_baku_id, $satuan_id, $jenis_id, $stock;
    public function render()
    {
        $stockbahanbaku = StockBahanBaku::with(['bahanbaku', 'jenis', 'satuan'])->get();
        $jenis = Jenis::all();
        $satuan = Satuan::all();
        $bahanbaku = BahanBaku::all();
        return view('livewire.admin.page-stock-bahan-baku', compact('stockbahanbaku', 'bahanbaku', 'jenis', 'satuan'));
    }
    public $itemAdd = false,
        $itemEdit = false,
        $itemDelete = false,
        $itemID = 0;

    public function clear()
    {
        $this->itemAdd = false;
        $this->itemEdit = false;
        $this->itemDelete = false;
        $this->itemID = 0;
        $this->bahan_baku_id = null;
        $this->satuan_id = null;
        $this->jenis_id = null;
        $this->stock = null;
    }
    public function addModal()
    {
        $this->itemAdd = true;
    }
    public function editModal($id)
    {
        $stock = StockBahanBaku::find($id);
        $this->bahan_baku_id = $stock->bahan_baku_id;
        $this->jenis_id = $stock->jenis_id;
        $this->satuan_id = $stock->satuan_id;
        $this->stock = $stock->stock;
        $this->itemID = $id;

        $this->itemEdit = true;
    }
    public function deleteModal($id)
    {
        $this->itemID = $id;

        $this->itemDelete = true;
    }
    public function create()
    {
        $valid = $this->validate([
            'bahan_baku_id' => 'required',
            'jenis_id' => 'required',
            'satuan_id' => 'required',
            'stock' => ['required', 'integer'],
        ]);
        Alert::success('Info', 'Berhasil Di Tambah');
        StockBahanBaku::create($valid);
        $this->clear();
    }
    public function edit($id)
    {
        $valid = $this->validate([
            'bahan_baku_id' => 'required',
            'jenis_id' => 'required',
            'satuan_id' => 'required',
            'stock' => ['required', 'integer'],
        ]);
        Alert::success('Info', 'Berhasil Di Edit');
        $this->clear();
        StockBahanBaku::find($id)->update($valid);
    }
    public function delete($id)
    {
        Alert::success('Info', 'Berhasil Di Hapus');
        $this->clear();
        StockBahanBaku::find($id)->delete();
    }
}
