<?php

namespace App\Http\Livewire\Admin;

use App\Models\Jenis;
use Livewire\Component;
use App\Models\StokProduk;
use App\Models\BahanBakuKemasan;
use App\Models\PengemasanBarang;
use App\Models\StockBahanBakuKemasan;
use RealRashid\SweetAlert\Facades\Alert;

class PageTahapPengemasan extends Component
{
    public $kode, $jenis_produk, $tgl_pengemasan, $jumlah, $jumlah_ml;
    public $itemCreate = false, $itemEdit = false, $itemDelete = false;
    public $ItemId;
    public function render()
    {
        $stokproduk = StokProduk::latest()->first();
        $data_produk = [];
        $jenis_produk = Jenis::all();
        $data = [];
        foreach ($jenis_produk as $key => $value) {
            $stok = StokProduk::where('jenis', $value->nama_jenis)->first();
            if($stok !== null){
                $data[] = StokProduk::where('jenis', $value->nama_jenis)->first();
            }
        }
        return view('livewire.admin.page-tahap-pengemasan', [
            'pengemasan' => PengemasanBarang::all(),
            'jenis' => Jenis::all(),
            'data_produksi'=> $data,
        ])->layoutData(['page' => 'Halaman Tahap Pengemasan']);
    }

    public function closeModal()
    {
        $this->kode = null;
        $this->jenis_produk = null;
        $this->tgl_pengemasan = null;
        $this->jumlah = null;
        $this->itemCreate = false;
        $this->itemEdit = false;
        $this->itemDelete = false;
    }
    public function generateKode()
    {
        $query = PengemasanBarang::max('id');
        if (empty($query)) {
            $this->kode = 'PB-001';
        } else {
            $exp =  explode("-", $query);
            $str = 'PB';
            $this->kode = sprintf("%s-0%u", $str, $query + 1);
        }
    }
    public function addModal()
    {
        $this->itemCreate = true;
    }
    public function create()
    {
        $this->validate([
            'kode' => 'required|unique:pengemasan_barangs,kode',
            'tgl_pengemasan' => 'required|date',
            'jumlah' => 'required|numeric',
            'jenis_produk' => 'required|numeric',
        ]);

        $jenis_produk_table = Jenis::find($this->jenis_produk);
        $pengemasan = PengemasanBarang::create([
            'kode' => $this->kode,
            'jenis_produk' => $this->jenis_produk,
            'nama_jenis' => $jenis_produk_table->nama_jenis,
            'tgl_pengemasan' => $this->tgl_pengemasan,
            'jumlah' => $this->jumlah,
        ]);

        // Dapatkan Stok Produk Berdasarkan Nama Jenis
        $stokproduk = StokProduk::where('jenis', $jenis_produk_table->nama_jenis)->first();

        // Dapatkan Jumlah Terakhir Produksi
        $stok_produksi = StokProduk::whereNull('jenis')->latest()->first();

        // Hitung Jumlah Liter
        $jumlah_liter = ($this->jumlah * intval($jenis_produk_table->jumlah)) / 1000;

        // Kurangi Stok Produk Pada Jumlah Produksi
        $kurangi_stock = $stok_produksi->jumlah_produksi - $jumlah_liter;

        StokProduk::create([
            'jenis' => null,
            'jumlah' => $jumlah_liter,
            'tgl_permintaan' => $this->tgl_pengemasan,
            'jumlah_produksi' => $kurangi_stock,
        ]);
        if ($stokproduk == null) {
            StokProduk::create([
                'jenis' => $jenis_produk_table->nama_jenis,
                'jumlah' => $this->jumlah,
                'tgl_permintaan' => $this->tgl_pengemasan,
                'jumlah_produksi' => $this->jumlah,
            ]);
        } else {
            $stokproduk->update([
                'jumlah' => $jumlah_liter,
                'tgl_permintaan' => $this->tgl_pengemasan,
                'jumlah_produksi' => intval($stokproduk->jumlah_produksi) + intval($this->jumlah),
            ]);
        }
        $this->getStokKemasan();

        Alert::success('info', 'Berhasil');
        $this->closeModal();
    }
    public function getStokKemasan()
    {
        $kemasan = BahanBakuKemasan::all();
        $stock = [];
        foreach ($kemasan as $item => $key) {
            $stock[] = StockBahanBakuKemasan::where('bahan_baku_id', $key->id)->decrement('stock', $this->jumlah);
            // $perhitungan_stock = ($this->jumlah);
            // $stock->update([
            //     'stock' => $perhitungan_stock
            // ]);
        }
        return $stock;
    }
    public function editModal($id)
    {
        $pengemasan = PengemasanBarang::find($id);
        $this->ItemId = $id;
        $this->kode = $pengemasan->kode;
        $this->jenis_produk = $pengemasan->jenis_produk;
        $this->tgl_pengemasan = $pengemasan->tgl_pengemasan;
        $this->jumlah = $pengemasan->jumlah;
        $this->itemEdit = true;
    }

    public function edit()
    {
        $this->validate([
            'kode' => 'required|exists:pengemasan_barangs,kode',
            'tgl_pengemasan' => 'required|date',
            'jumlah' => 'required|numeric',
        ]);
        $pengemasan = PengemasanBarang::find($this->ItemId)->update([
            'kode' => $this->kode,
            'jenis_produk' => $this->jenis_produk,
            'tgl_pengemasan' => $this->tgl_pengemasan,
            'jumlah' => $this->jumlah,
        ]);
        Alert::success("info", 'Berhasil Di Update');
        $this->closeModal();
    }

    public function deleteModal($id)
    {
        $this->ItemId = $id;
        $this->itemDelete = true;
    }
    public function delete()
    {
        $pengemasan = PengemasanBarang::find($this->ItemId);
        $pengemasan->delete();
        Alert::success("info", 'Berhasil Di Hapus');
        $this->closeModal();
    }
}
