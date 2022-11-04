<?php

namespace App\Http\Livewire\Admin;

use App\Models\Jenis;
use App\Models\Satuan;
use Livewire\Component;
use App\Models\BahanBakuKemasan;
use App\Models\StockBahanBakuKemasan;
use RealRashid\SweetAlert\Facades\Alert;

class PageStockBahanBakuKemasan extends Component
{
    public $bahan_baku_id, $satuan_id, $jenis_id, $stock ,$max;
    public $itemAdd = false,
    $itemEdit = false,
    $itemDelete = false,
    $itemID = 0;
    public function render()
    {
        $stockbahanbaku = StockBahanBakuKemasan::with(['bahanbaku',  'satuan'])->get();
        $jenis = Jenis::all();
        $satuan = Satuan::all();
        $bahanbaku = BahanBakuKemasan::all();
        return view('livewire.admin.page-stock-bahan-baku-kemasan', compact('stockbahanbaku', 'bahanbaku', 'satuan'))
        ->layoutData(['page'=> 'Halaman Bahan Baku Kemasan']);
    }



    public function clear()
    {
        $this->itemAdd = false;
        $this->itemEdit = false;
        $this->itemDelete = false;
        $this->itemID = 0;
        $this->bahan_baku_id = null;
        $this->satuan_id = null;
        $this->stock = null;
        $this->max = null;
    }
    public function addModal()
    {
        $this->itemAdd = true;
    }
    public function editModal($id)
    {
        $stock = StockBahanBakuKemasan::find($id);
        $this->bahan_baku_id = $stock->bahan_baku_id;
        $this->satuan_id = $stock->satuan_id;
        $this->stock = $stock->stock;
        $this->max = $stock->max;
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
            'satuan_id' => 'required',
            'stock' => ['required', 'integer'],
            'max'=> 'required'
        ]);
        Alert::success('Info', 'Berhasil Di Tambah');
        StockBahanBakuKemasan::create($valid);
        $this->clear();
    }
    public function edit($id)
    {
        $valid = $this->validate([
            'bahan_baku_id' => 'required',
            'satuan_id' => 'required',
            'max'=> 'required',
            'stock' => ['required', 'integer'],
        ]);
        Alert::success('Info', 'Berhasil Di Edit');
        $this->clear();
        StockBahanBakuKemasan::find($id)->update($valid);
    }
    public function delete($id)
    {
        Alert::success('Info', 'Berhasil Di Hapus');
        $this->clear();
        StockBahanBakuKemasan::find($id)->delete();
    }
}
