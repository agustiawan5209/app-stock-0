<?php

namespace App\Http\Livewire\Admin;

use App\Models\BahanBakuKemasan;
use App\Models\BarangKeluar;
use App\Models\Customer;
use App\Models\Jenis;
use App\Models\Produk;
use App\Models\ProdukFermentasi;
use App\Models\StockBahanBakuKemasan;
use App\Models\StokProduk;
use Livewire\Component;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;

class PageBarangKeluar extends Component
{
    use WithFileUploads;
    public $kode, $itemID,  $jumlah = 0, $alamat, $customer, $tgl_keluar, $jenis_id, $sub_total, $total_harga, $id_transaksi, $bukti_transaksi, $status, $ket, $harga_produk = 10;

    public $itemAdd = false, $itemDelete = false, $itemEdit = false, $tambahItem = true;
    public $row = 10, $search = '';

    public function generateKode()
    {
        $query = BarangKeluar::max('id');
        if (empty($query)) {
            $this->kode = 'KBK-001';
        } else {
            $exp =  explode("-", $query);
            $str = 'KBK';
            $this->kode = sprintf("%s-0%u", $str, $query + 1);
        }
    }
    public function getStokKemasan($id)
    {
        $kemasan = BahanBakuKemasan::all();
        $jenis = Jenis::find($id);
        foreach ($kemasan as $item => $key) {
            $stock = StockBahanBakuKemasan::where('bahan_baku_id', $key->id)->first();

            // Mengurangi Stok Pada Bahan Baku Kemasan
            $perhitungan_stock = $stock->stock - $stock->max * ($this->jumlah * ($jenis->jumlah / 1000));

            $stock->update([
                'stock' => $perhitungan_stock
            ]);
            $data[$key->id] = $perhitungan_stock;
        }
        return $data;
    }
    public function BuatHarga()
    {
        $jenis = Jenis::find($this->jenis_id);
        $this->harga_produk = $jenis->harga;
    }
    public function render()
    {
        $barangkeluar = BarangKeluar::with(['transaksi', 'jenis'])->orderBy('id', 'desc')->get();
        if ($this->search != null) {
            $barangkeluar = BarangKeluar::with(['transaksi', 'jenis'])->orderBy('id', 'desc')
                ->where('kode_barang_keluar', 'like', '%' . $this->search . '%')
                ->Orwhere('jumlah', 'like', '%' . $this->search . '%')
                ->Orwhere('alamat_tujuan', 'like', '%' . $this->search . '%')
                ->Orwhere('customer', 'like', '%' . $this->search . '%')
                ->Orwhere('tgl_keluar', 'like', '%' . $this->search . '%')
                ->get();
        }
        $jenis = Jenis::all();
        $customer_id = Customer::all();
        return view('livewire.admin.page-barang-keluar', compact('barangkeluar', 'customer_id', 'jenis'))->layoutData(['page' => 'Halaman Barang Keluar']);
    }
    public function addModal()
    {
        $this->itemAdd = true;
    }
    public function editModal($id)
    {
        $barangkeluar = BarangKeluar::find($id);
        $this->itemID = $barangkeluar->id;
        $this->kode = $barangkeluar->kode_barang_keluar;
        $this->jumlah = $barangkeluar->jumlah;
        $this->alamat = $barangkeluar->alamat_tujuan;
        $this->customer = $barangkeluar->customer;
        $this->tgl_keluar = $barangkeluar->tgl_keluar;
        $this->sub_total = "Rp." . number_format($barangkeluar->sub_total);
        $this->total_harga = $barangkeluar->sub_total;
        $this->jenis_id = $barangkeluar->jenis_id;
        $this->itemAdd = true;
        $this->itemEdit = true;
    }
    public function deleteModal($id)
    {
        $barangkeluar = BarangKeluar::find($id);
        $this->itemID  = $barangkeluar->id;
        $this->itemDelete = true;
    }
    public function getTotal()
    {
        $this->sub_total = "Rp. " . number_format(intval($this->jumlah) * intval($this->harga_produk));
        $this->total_harga = intval($this->jumlah) * intval($this->harga_produk);
    }
    public function create()
    {
        $this->validate([
            'kode' => 'required|unique:barang_keluars,kode_barang_keluar',
            'jumlah' => 'required',
            'alamat' => 'required',
            'customer' => 'required',
            'tgl_keluar' => ['required', 'date'],
            'jenis_id' => 'required',
            'sub_total' => 'required',
        ]);
        $produk = ProdukFermentasi::sum('jumlah_stock');
        // dd($produk);
        if ($produk < $this->jumlah) {
            Alert::error('Maaf', 'Jumlah Produk Siap Jual Kurang');
            $this->closeModal();
        } else {

            $jenis = Jenis::find($this->jenis_id);
            $dataProduksi = StokProduk::latest()->first();
            $stokproduk = StokProduk::where('jenis', $jenis->nama_jenis)->first();
            if ($stokproduk == null) {
                Alert::error('Gagal', 'Stok Botol ' . $jenis->nama_jenis . ' Kosong');
            } else {
                $jumlah_produksi = $stokproduk->jumlah_produksi;
                $jumlah_barang = $this->jumlah;

                if ($jumlah_barang > $jumlah_produksi) {
                    Alert::error('Gagal', 'Stok Botol ' . $jenis->nama_jenis . ' Kurang');
                }
                if ($jumlah_barang < $jumlah_produksi) {
                    $barangkeluar = new BarangKeluar();
                    $barangkeluar->kode_barang_keluar = $this->kode;
                    $barangkeluar->jumlah = $this->jumlah;
                    $barangkeluar->alamat_tujuan = $this->alamat;
                    $barangkeluar->tgl_keluar = $this->tgl_keluar;
                    $barangkeluar->customer = $this->customer;
                    $barangkeluar->sub_total = $this->total_harga;
                    $barangkeluar->jenis_id = $this->jenis_id;
                    $barangkeluar->nama_jenis = $jenis->nama_jenis;
                    $barangkeluar->save();
                    $this->getStokKemasan($this->jenis_id);
                    $stokproduk->update([
                        'jumlah' => $this->jumlah,
                        'jumlah_produksi' => $jumlah_produksi - $jumlah_barang,
                        'tgl_permintaan' => $this->tgl_keluar,
                    ]);
                    $this->closeModal();
                    Alert::success('info', 'Berhasil Di Tambah');
                }
            }
        }
    }
    public function edit($id)
    {
        $jenis = Jenis::find($this->jenis_id);

        $barangkeluar = BarangKeluar::where('id', $id)->update([
            'kode_barang_keluar' => $this->kode,
            'jumlah' => $this->jumlah,
            'alamat_tujuan' => $this->alamat,
            'customer' => $this->customer,
            'tgl_keluar' => $this->tgl_keluar,
            'sub_total' => $this->total_harga,
            'jenis_id' => $this->jenis_id,
            'nama_jenis'=> $jenis->nama_jenis,
        ]);
        $this->closeModal();

        Alert::success('info', 'Berhasil Di Update');
    }
    public function delete($id)
    {
        BarangKeluar::find($id)->delete();
        $this->closeModal();
        Alert::success('info', 'Berhasil Di Hapus');
    }
    public function closeModal()
    {
        $this->itemDelete = false;
        $this->itemAdd = false;
        $this->itemEdit = false;
        $this->kode = null;
        $this->jumlah = null;
        $this->alamat = null;
        $this->tgl_keluar = null;
        $this->sub_total = null;
        $this->total_harga = null;
        $this->jenis_id = null;
    }
}
