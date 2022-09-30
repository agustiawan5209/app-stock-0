<?php

namespace App\Http\Livewire\Admin;

use App\Models\BarangKeluar;
use App\Models\Customer;
use Livewire\Component;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;

class PageBarangKeluar extends Component
{
    use WithFileUploads;
    public $kode, $itemID,  $jumlah, $alamat, $customer, $tgl_keluar, $sub_total, $id_transaksi, $bukti_transaksi, $status, $ket;
    public $itemAdd = false, $itemDelete = false, $itemEdit = false;
    public $row = 10, $search = '';

    public function generateKode()
    {
        $query = BarangKeluar::max('id');
        if (empty($query)) {
            $this->kode = 'KBK-01';
        } else {
            $exp =  explode("-", $query);
            $str = 'KBK';
            $this->kode = sprintf("%s-0%u", $str, $query + 1);
        }
    }
    public function render()
    {
        $barangkeluar = BarangKeluar::orderBy('id','desc')->paginate($this->row);
        if($this->search != null){
            $barangkeluar = BarangKeluar::orderBy('id','desc')
            ->where('kode_barang_keluar', 'like', '%'. $this->search .'%')
            ->Orwhere('jumlah', 'like', '%'. $this->search .'%')
            ->Orwhere('alamat', 'like', '%'. $this->search .'%')
            ->Orwhere('customer', 'like', '%'. $this->search .'%')
            ->Orwhere('tgl_keluar', 'like', '%'. $this->search .'%')
            ->paginate($this->row);
        }
        $customer_id = Customer::all();
        return view('livewire.admin.page-barang-keluar', compact('barangkeluar', 'customer_id'));
    }
    public function addModal(){
        $this->itemAdd = true;
    }
    public function editModal($id){
        $barangkeluar = BarangKeluar::find($id);
        $this->itemID = $barangkeluar->id;
        $this->itemEdit = true;
    }
    public function deleteModal($id){
        $barangkeluar = BarangKeluar::find($id);
        $this->itemID  = $barangkeluar->id;
        $this->itemDelete = true;
    }

    public function create(){
        $this->validate([
            'kode'=> 'required',
            'jumlah'=> 'required',
            'alamat'=>'required',
            'customer'=> 'required',
            'tgl_keluar'=> 'required',
            'sub_total'=> 'required',
        ]);
        $barangkeluar = new BarangKeluar();
        $barangkeluar->kode_barang_keluar = $this->kode;
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
            'kode_barang_keluar'=> $this->kode,
            'jumlah'=> $this->jumlah,
            'alamat'=> $this->alamat,
            'customer'=> $this->customer,
            'tgl_keluar'=> $this->tgl_keluar,
            'sub_total'=> $this->sub_total,
        ]);
        $this->itemEdit = false;
        Alert::success('info' , 'Berhasil Di Update');
    }
    public function delete($id){
        BarangKeluar::find($id)->delete();
        $this->itemDelete = false;
        Alert::success('info' , 'Berhasil Di Hapus');
    }
    public function CloseModal(){
        $this->itemDelete = false;
        $this->itemAdd = false;
        $this->itemEdit = false;
    }
}
