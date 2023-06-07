<?php

namespace App\Http\Livewire\Admin;

use App\Models\Produk;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\StockBahanBaku;
use App\Models\ProdukFermentasi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CrudFermentasi extends Component
{
    public $kode,
        $jumlah_stock,
        $status = 1,
        $itemAdd = false,
        $itemEdit = false,
        $itemDelete = false,
        $item = null,
        $itemID,
        $loadingState = false,
        $data = [],
        $gagal = false,
        $dataError = [];

    public $tgl_frementasi;

    public function mount(Request $request)
    {
        $this->item = $request->all();
        $this->tgl_frementasi = Carbon::now()->format('Y-m-d');
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
        // dd($this->item);
        $this->kode();

        if ($this->item != null) {
            $this->itemEdit = true;
            $fer = ProdukFermentasi::find($this->item['id']);
            $this->tgl_frementasi = $fer->tgl_frementasi;
            $this->kode = $fer->kode;
            $this->jumlah_stock = $fer->jumlah_stock;
        }
        $stock = StockBahanBaku::all();

        return view('livewire.admin.crud-fermentasi', compact('stock'))->layoutData(['page' => 'Halaman Proses Produksi']);
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
        $this->validate([
            'kode' => 'required',
            'jumlah_stock' => 'required|numeric',
        ]);
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
    public function hitungJumlah()
    {
        $stock = StockBahanBaku::select('id')->get();
        // dd();
        foreach ($stock as $item => $key) {
            $stock = StockBahanBaku::find($key->id);
            // Hitung Jumlah Pengunaan
            $hasil = ($stock->max * $this->jumlah_stock);
            if ($stock->stock < $hasil) {
                $this->dataError[] = $stock->bahanbaku->nama_bahan_baku;
                $this->gagal = true;
                Alert::error('Gagal');
            }
            $this->data[$item] = $hasil;
        }
        // dd(count($this->dataError));
        $this->loadingState = true;

        // dd($this->data);
    }
    public function loadingData()
    {
    }
}
