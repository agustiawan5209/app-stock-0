<?php

namespace App\Http\Livewire\Admin;

use App\Models\Jenis;
use App\Models\Status;
use Livewire\Component;
use App\Models\Customer;
use App\Models\StokProduk;
use App\Models\PesananUser;
use App\Models\BarangKeluar;
use Livewire\WithFileUploads;
use App\Models\BahanBakuKemasan;
use App\Models\ProdukFermentasi;
use App\Models\StockBahanBakuKemasan;
use RealRashid\SweetAlert\Facades\Alert;

class PagePenjualan extends Component
{
    use WithFileUploads;
    public $itemID, $itemDetail = false;
    // ItemTable
    public $itemStatus = false, $itemEdit = false, $statusItem, $ket;
    public $user, $jenis, $jumlah, $sub_total, $status, $detail;

    // Variabel Form Barang Keluar
    public $kode, $alamat, $customer, $tgl_keluar,$nama_jenis, $jenis_id, $total_harga, $id_transaksi, $bukti_transaksi, $harga_produk = 10;

    public $itemAdd = false, $itemDelete = false,  $tambahItem = true;
    public $row = 10, $search = '';
    public function render()
    {
        $pesanan = PesananUser::all();
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
        $jenisBahan = Jenis::all();
        $customer_id = Customer::all();
        // dd($jenis);
        return view('livewire.admin.page-penjualan', [
            'pesan' => $pesanan,
            'barang_keluar' => $barangkeluar,
            'jenisBahan' => $jenisBahan,
            'customer_id' => $customer_id,
        ])
            ->layoutData(['page' => 'Halaman Penjualan']);
    }
    public function detailModal($id)
    {
        $this->itemDetail = true;
        $pesananUser = PesananUser::find($id);
        $this->detail = $pesananUser;
        $this->user = $pesananUser->user;
        $this->jenis = $pesananUser->jenis;
        $this->jumlah = $pesananUser->jumlah;
        $this->sub_total = $pesananUser->sub_total;
        $this->status = $pesananUser->status;
    }
    public function statusPesanan($id)
    {
        $b = PesananUser::find($id);
        $this->itemID = $id;
        $this->jenis_id = $b->jenis_id;
        $this->nama_jenis = $b->jenis->nama_jenis;
        $this->jumlah = $b->jumlah;
        $this->sub_total = $b->sub_total;
        $this->customer = $b->user->name;
        $this->kode = $this->generateKode();
        $this->itemStatus = true;
        $this->statusItem =  $b->status;
    }
    public function updateStatus($id)
    {
        $pesanan = PesananUser::find($id);
        $this->validate([
            'status' => 'required',
            'ket' => 'required',
        ]);
        if ($this->status === 3 || $this->status === "3") {
            $this->validate([
                'kode' => 'required',
                'jumlah' => 'required',
                'alamat' => 'required',
                'customer' => 'required',
                'tgl_keluar' => ['required', 'date'],
                'nama_jenis' => 'required',
                'sub_total' => 'required',
            ]);
            $produk = ProdukFermentasi::sum('jumlah_stock');
            // dd($produk);

            $jenis = Jenis::find($this->jenis_id);
            $stokproduk = StokProduk::where('jenis', $jenis->nama_jenis)->first();
            $dataProduksi = StokProduk::latest()->first();

            $this->getStokKemasan($this->jenis_id);
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
                    $barangkeluar->sub_total = $this->sub_total;
                    $barangkeluar->jenis_id = $this->jenis_id;
                    $barangkeluar->nama_jenis = $jenis->nama_jenis;
                    $barangkeluar->save();
                    $stokproduk->update([
                        'jumlah' => $this->jumlah,
                        'jumlah_produksi' => $jumlah_produksi - $jumlah_barang,
                        'tgl_permintaan' => $this->tgl_keluar,
                    ]);

                }
            }
        }
        $pesanan->update(['status' => $this->status]);
        $status = Status::create([
            'pesanan_id' => $pesanan->id,
            'jenis' => '2',
            'status' => $this->status,
            'ket' => $this->ket,
        ]);
        Alert::success('Info', 'Berhasil Di Ganti...!!!');
        $this->itemStatus = false;
    }

    // Fungsi Form Barang Keluar
    public function getStokKemasan($id)
    {
        $kemasan = BahanBakuKemasan::all();
        $jenis = Jenis::find($id);
        foreach ($kemasan as $item => $key) {
            $stock = StockBahanBakuKemasan::where('bahan_baku_id', $key->id)->first();
            $perhitungan_stock = $stock->stock - $stock->max * ($this->jumlah * ($jenis->jumlah / 1000));
            $stock->update([
                'stock' => $perhitungan_stock
            ]);
            $data[$key->id] = $perhitungan_stock;
        }
        // $stokProduk = StokProduk::where('jenis', '=' , $jenis->jumlah)->latest()->first();
        // $stokProduk->decrement('jumlah_produksi', $jenis->jumlah);
        return $data;
    }
    public function BuatHarga()
    {
        $jenis = Jenis::find($this->jenis_id);
        $this->harga_produk = $jenis->harga;
    }
    public function create()
    {
        $this->validate([
            'kode' => 'required',
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
            $barangkeluar = new BarangKeluar();
            $barangkeluar->kode_barang_keluar = $this->kode;
            $barangkeluar->jumlah = $this->jumlah;
            $barangkeluar->alamat_tujuan = $this->alamat;
            $barangkeluar->tgl_keluar = $this->tgl_keluar;
            $barangkeluar->customer = $this->customer;
            $barangkeluar->sub_total = $this->sub_total;
            $barangkeluar->jenis_id = $this->jenis_id;
            $barangkeluar->nama_jenis = $jenis->nama_jenis;
            $barangkeluar->save();
            $this->getStokKemasan($this->jenis_id);
            $jenis = Jenis::find($this->jenis_id);
            $dataProduksi = StokProduk::latest()->first();
            StokProduk::create([
                'jenis' => "barangKeluar",
                'jumlah' => $this->jumlah,
                'jumlah_produksi' => $dataProduksi->jumlah_produksi - ($this->jumlah * ($jenis->jumlah / 1000)),
                'tgl_permintaan' => $this->tgl_keluar,
            ]);
            Alert::success('info', 'Berhasil Di Tambah');
        }
    }
    public function generateKode()
    {
        $kode = null;
        $query = BarangKeluar::max('id');
        if (empty($query)) {
            $kode = 'KBK-001';
        } else {
            $exp =  explode("-", $query);
            $str = 'KBK';
            $kode = sprintf("%s-0%u", $str, $query + 1);
        }
        return $kode;
    }
}
