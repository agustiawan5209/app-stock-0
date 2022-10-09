<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProdukFermentasi;
use App\Models\StockBahanBaku;
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
    public function hitungFermentasi($date)
    {
        $carbon = Carbon::now()->format('Y-m-d');
        $second = Carbon::createFromDate($date);

        return $second->diffInDays($carbon);
    }
    public function render()
    {
        $this->SelesaiFermentasi();
        $date = ProdukFermentasi::latest()->first();
        // dd($this->hitungFermentasi($date->tgl_frementasi));
        $produk = ProdukFermentasi::all();
        $stock = StockBahanBaku::all();
        return view('livewire.admin.page-produk-fermentasi', compact('produk', 'stock'))->layoutData(['page' => 'Halaman Produk Fermentasi']);
    }
    public function addModal()
    {
        return redirect()->route('Admin.Crud-Fermentasi');
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
        return redirect()->route('Admin.Crud-Fermentasi', ['id'=> $satuan->id,'kode'=> $this->kode]);
    }

}