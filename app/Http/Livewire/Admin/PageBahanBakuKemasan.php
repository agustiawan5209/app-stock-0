<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\BahanBakuKemasan;
use RealRashid\SweetAlert\Facades\Alert;

class PageBahanBakuKemasan extends Component
{
    public $nama_bahan_baku, $itemAdd = false, $itemEdit = false, $itemDelete = false, $itemID;
    public function render()
    {
        $bahan = BahanBakuKemasan::all();

        return view('livewire.admin.page-bahan-baku-kemasan', compact('bahan'))->layoutData(['page'=> 'Halaman Bahan Baku Kemasan']);
    }
    public function addModal(){
        // Alert::info('Info Title', 'Info Message');
        $this->itemAdd = true;
    }
    public function editModal($id){
        $satuan = BahanBakuKemasan::find($id);
        // dd($satuan);
        $this->nama_bahan_baku = $satuan->nama_bahan_baku;
        $this->itemID = $satuan->id;
        $this->itemEdit = true;
    }
    public function deleteModal($id){
        $satuan = BahanBakuKemasan::find($id);
        $this->itemID = $satuan->id;
        $this->itemDelete = true;
    }

    // Crud
    public function create(){
        BahanBakuKemasan::create([
            'nama_bahan_baku' => $this->nama_bahan_baku,
        ]);
        $this->itemAdd = false;
        Alert::info('Info', 'Berhasil Di Simpan');

    }
    public function edit($id){
        BahanBakuKemasan::where('id', $id)->update([
            'nama_bahan_baku' => $this->nama_bahan_baku,
        ]);
        $this->itemEdit = false;
        Alert::info('Info', 'Berhasil Di Update');

    }
    public function delete($id){
        BahanBakuKemasan::find($id)->delete();
        $this->itemDelete = false;
        Alert::warning('Pesan', 'Berhasil Dihapus');

    }
}
