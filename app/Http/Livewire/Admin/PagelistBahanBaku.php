<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\BahanBaku;
use RealRashid\SweetAlert\Facades\Alert;

class PagelistBahanBaku extends Component
{

    public $nama_bahan_baku, $itemAdd = false, $itemEdit = false, $itemDelete = false, $itemID;
    public function render()
    {
        $bahan = BahanBaku::all();
        return view('livewire.admin.pagelist-bahan-baku', compact('bahan'))->layoutData(['page'=> 'Halaman Bahan Baku']);
    }
    // Modal
    public function addModal(){
        // Alert::info('Info Title', 'Info Message');
        $this->itemAdd = true;
    }
    public function editModal($id){
        $satuan = BahanBaku::find($id);
        // dd($satuan);
        $this->nama_bahan_baku = $satuan->nama_bahan_baku;
        $this->itemID = $satuan->id;
        $this->itemEdit = true;
    }
    public function deleteModal($id){
        $satuan = BahanBaku::find($id);
        $this->itemID = $satuan->id;
        $this->itemDelete = true;
    }

    // Crud
    public function create(){
        BahanBaku::create([
            'nama_bahan_baku' => $this->nama_bahan_baku,
        ]);
        $this->itemAdd = false;
        Alert::info('Info', 'Berhasil Di Simpan');

    }
    public function edit($id){
        BahanBaku::where('id', $id)->update([
            'nama_bahan_baku' => $this->nama_bahan_baku,
        ]);
        $this->itemEdit = false;
        Alert::info('Info', 'Berhasil Di Update');

    }
    public function delete($id){
        BahanBaku::find($id)->delete();
        $this->itemDelete = false;
        Alert::warning('Pesan', 'Berhasil Dihapus');

    }
}
