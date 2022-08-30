<?php

namespace App\Http\Livewire\Admin;

use App\Models\BarangKeluar;
use Livewire\Component;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;

class PageBarangKeluar extends Component
{
    use WithFileUploads;
    public $kode, $itemID, $jumlah, $alamat, $customer, $tgl_keluar, $sub_total, $id_transaksi, $bukti_transaksi, $status, $ket;
    public $itemAdd = false, $itemDelete = false;
    public $row = 10, $search = '';
    public function render()
    {
        $barangkeluar = BarangKeluar::orderBy('id','desc')->paginate($this->row);
        if($this->search != null){
            $barangkeluar = BarangKeluar::orderBy('id','desc')
            ->where('kode', 'like', '%'. $this->search .'%')
            ->Orwhere('jumlah', 'like', '%'. $this->search .'%')
            ->Orwhere('alamat', 'like', '%'. $this->search .'%')
            ->Orwhere('customer', 'like', '%'. $this->search .'%')
            ->Orwhere('tgl_keluar', 'like', '%'. $this->search .'%')
            ->paginate($this->row);
        }
        return view('livewire.admin.page-barang-keluar', compact('barangkeluar'));
    }
    public function addModal(){
        $this->itemAdd = true;
    }
    public function editModal($id){
        $barangkeluar = BarangKeluar::find($id);
        $this->itemID = $barangkeluar->id;
        $this->itemAdd = true;
    }
    public function deleteModal($id){
        $barangkeluar = BarangKeluar::find($id);
        $this->itemID  = $barangkeluar->id;
        $this->itemDelete = true;
    }

    public function create(){
        $barangkeluar = new BarangKeluar();
        $barangkeluar->kode = $this->kode;
        $barangkeluar->jumlah = $this->jumlah;
        $barangkeluar->alamat = $this->alamat;
        $barangkeluar->tgl_keluar = $this->tgl_keluar;
        $barangkeluar->sub_total = $this->sub_total;
        $barangkeluar->customer = $this->customer;
        $barangkeluar->save();
        $this->itemAdd = false;
        Alert::success('info' , 'Berhasil Di Tambah');
    }
    public function edit($id){
        $barangkeluar = BarangKeluar::where('id', $id)->update([
            'kode'=> $this->kode,
            'jumlah'=> $this->jumlah,
            'alamat'=> $this->alamat,
            'customer'=> $this->customer,
            'tgl_keluar'=> $this->tgl_keluar,
            'sub_total'=> $this->sub_total,
        ]);
        $this->itemAdd = false;
        Alert::success('info' , 'Berhasil Di Update');
    }
    public function delete($id){
        BarangKeluar::find($id)->delete();
        $this->itemDelete = false;
        Alert::success('info' , 'Berhasil Di Hapus');
    }
}
