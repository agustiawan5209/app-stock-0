<?php

namespace App\Http\Livewire\Admin;

use App\Models\Satuan;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class PageSatuan extends Component
{
    public $nama_satuan, $itemAdd = false, $itemEdit = false, $itemDelete = false, $itemID;
    public function render()
    {
        $satuan = Satuan::all();
        // dd($satuan);
        return view('livewire.admin.page-satuan', compact('satuan'))->layoutData(['page'=> 'Halaman Satuan']);
    }

    // Modal
    public function addModal(){
        // Alert::info('Info Title', 'Info Message');
        $this->itemAdd = true;
    }
    public function editModal($id){
        $satuan = Satuan::find($id);
        // dd($satuan);
        $this->nama_satuan = $satuan->nama_satuan;
        $this->itemID = $satuan->id;
        $this->itemEdit = true;
    }
    public function deleteModal($id){
        $satuan = Satuan::find($id);
        $this->itemID = $satuan->id;
        $this->itemDelete = true;
    }

    // Crud
    public function create(){
        Satuan::create([
            'nama_satuan' => $this->nama_satuan,
        ]);
        $this->itemAdd = false;
        Alert::info('Info', 'Berhasil Di Simpan');

    }
    public function edit($id){
        Satuan::where('id', $id)->update([
            'nama_satuan' => $this->nama_satuan,
        ]);
        $this->itemEdit = false;
        Alert::info('Info', 'Berhasil Di Update');

    }
    public function delete($id){
        Satuan::find($id)->delete();
        $this->itemDelete = false;
        Alert::warning('Pesan', 'Berhasil Dihapus');

    }
}
