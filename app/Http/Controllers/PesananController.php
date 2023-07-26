<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Jenis;
use App\Models\Status;
use App\Models\Pesanan;
use App\Models\Transaksi;
use App\Models\StokProduk;
use App\Models\BarangMasuk;
use App\Models\PesananUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProdukFermentasi;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StorePesananRequest;
use App\Http\Requests\UpdatePesananRequest;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function receive(Request $request)
    {
        $this->validate($request, [
            'bukti' => ['required', 'image'],
            'tgl' => ['required', 'date'],
            'jumlah' => ['required', 'integer'],
            'sub_total' => ['required', 'integer'],
            'metode' => ['required', 'string'],
        ]);
        $data = session('data');
        // dd($data);
        $ext =  $request->bukti->getClientOriginalExtension();
        $namaFile = Str::random(10) . '.' . $ext;
        $iD_transaksi = $this->transaksiKode();
        $transaksis =  array(
            "ID_transaksi" => $iD_transaksi,
            "metode" => $request->metode,
            "tgl_transaksi" => $request->tgl,
            "bukti_transaksi" => $namaFile,
            "keterangan" => $request->id,
            "created_at" => NULL,
            "updated_at" => NULL,
        );
        // Buat Transaksi
        $transaksi =  Transaksi::create($transaksis);
        // Buat Pesanan
        $pesan = Pesanan::create([
            "bahan_baku_id" => $data['bahan_baku'],
            "nama_bahan_baku" => $data['nama_bahan_baku'],
            "satuan_id" => $data['satuan'],
            "jumlah" => $request->jumlah,
            'jenis'=> $data['jenis'],
            "transaksi_id" => $transaksi->id,
            "sub_total" => $request->jumlah * $data['harga'],
        ]);

        $request->bukti->storeAs('upload/bukti', $namaFile);
        // Buat Barang Masuk
        $barang = BarangMasuk::create([
            'kode' => $this->kodeBM(),
            'pesanan_id' => $pesan->id,
            'status' => 1,
            'supplier_id' => $data['supplier_id'],
            'bahan_supplier_id'=> $data['itemID']
        ]);
        // Buat Status
        $status = Status::create([
            'pesanan_id' => $pesan->id,
            'status' => '0',
            'ket' => 'Pembelian Bahan Baku',
        ]);
        Alert::success('Info', "Pemesanan berhasil mohon tunggu konfirmasi");
        return redirect()->route('Admin.Tr-Pesanan');
    }

    public function transaksiKode()
    {
        $kode_transaksi = 'ID' . Str::random(15);
        $transaksi = Transaksi::where('ID_transaksi', $kode_transaksi)->get();
        if ($transaksi == null) {
            return $kode_transaksi;
        } else {
            return  $kode_transaksi = 'ID' . Str::random(15);
        }
    }
    public function kodeBM()
    {
        $barang = BarangMasuk::latest()->first();
        if ($barang == null) {
            $Kode = "BM-001";
        } else {
            $huruf = "BM-";
            $kd = $barang->kode;
            $kd = substr($kd, 3, 3);
            $kd++;
            $Kode = $huruf . sprintf('%03s', $kd);
        }
        return $Kode;
    }

    /**
     * receiveUser
     * Form Pembayaran User
     * @param  mixed $request
     * @return void
     */
    public function receiveUser(Request $request)
    {
        $this->validate($request,[
            'metode'=> 'required',
            'bukti'=> ['required', 'image'],

        ]);
        $sum_produk = ProdukFermentasi::sum('jumlah_stock');
        if($sum_produk < $request->jumlah){
            Alert::error('Jumlah Stock Kurang', 'Permintaan Jumlah Tidak Mencukupi');
            return redirect()->back();
        }
        $ext =  $request->bukti->getClientOriginalExtension();
        $n = $request->bukti->getClientOriginalName();
        $namaFile = md5($n) . '.' . $ext;
        $iD_transaksi = $this->transaksiKode();
        $transaksis =  array(
            "ID_transaksi" => $iD_transaksi,
            "metode" => $request->metode,
            "tgl_transaksi" => $request->tgl,
            "bukti_transaksi" => $namaFile,
            "keterangan" => $request->id,
        );
        $request->bukti->storeAs('upload/bukti', $namaFile);
        // Buat Transaksi
        $jenis = Jenis::find($request->item);
        $transaksi =  Transaksi::create($transaksis);
        $stokProduk = StokProduk::latest()->first();
        $sum_produk = ProdukFermentasi::sum('jumlah_stock');
        $hasil_pembelian_jumlah = ($request->jumlah * $jenis->jumlah);
        if($stokProduk == null){
            StokProduk::create([
                'jenis_id'=> $request->item,
                'jumlah'=> $request->jumlah,
                'tgl_permintaan'=> Carbon::now()->format('Y-m-d'),
                'jumlah_produksi'=> $sum_produk - ($hasil_pembelian_jumlah / 1000)
            ]);
        }else{
            StokProduk::create([
                'jenis_id'=> $request->item,
                'jumlah'=> $request->jumlah,
                'tgl_permintaan'=> Carbon::now()->format('Y-m-d'),
                'jumlah_produksi'=> $stokProduk->jumlah_produksi - ($hasil_pembelian_jumlah / 1000)
            ]);
        }
        $pesananUser = PesananUser::create([
            'user_id'=> Auth::user()->id,
            'transaksi_id' => $transaksi->id,
            'jenis_id' => $request->item,
            'nama_jenis' => $jenis->nama_jenis,
            'jumlah' => $request->jumlah,
            'sub_total' => $jenis->harga * $request->jumlah,
            'status' => '1',
            'ket' => $request->ket,
        ]);
        Alert::success("Pemesanan Berhasil", "Mohon Tunggu Konfirmasi");
        return redirect()->route('dashboard');
    }
}
