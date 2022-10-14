<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Transaksi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StorePesananRequest;
use App\Http\Requests\UpdatePesananRequest;
use App\Models\BarangMasuk;
use RealRashid\SweetAlert\Facades\Alert;

class PesananController extends Controller
{
    public function receive(Request $request)
    {
        $this->validate($request, [
            'bukti' => ['required', 'image', 'mimes:png,jpg'],
            'tgl' => ['required', 'date'],
            'jumlah' => ['required', 'integer'],
            'sub_total' => ['required', 'integer'],
            'metode' => ['required', 'string'],
        ]);
        $data = session('data');
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
        $request->bukti->storeAs('upload/bukti', $namaFile);
        // Buat Transaksi
      $transaksi =  Transaksi::create($transaksis);
        // Buat Pesanan
       $pesan = Pesanan::create(array(
            "id" => NULL,
            "bahan_baku_id" => $data['itemID'],
            "satuan_id" => $data['satuan'],
            "jumlah" => $request->jumlah,
            "transaksi_id" => $transaksi->id,
            "sub_total" => $request->sub_total,
        ));

        // Buat Barang Masuk
        $barang = BarangMasuk::create([
            'kode'=> $this->kodeBM(),
            'pesanan_id'=> $pesan->id,
            'status'=> 1,
            'supplier_id'=> $data['supplier_id'],
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
    public function kodeBM(){
        $barang = BarangMasuk::latest()->first();
        if($barang == null){
            $Kode = "BM-001";
        }else{
            $huruf = "BM-";
            $kd = $barang->kode;
            $kd = substr($kd, 3,3);
            $kd++;
            $Kode =$huruf . sprintf('%03s', $kd);
        }
        return $Kode;
    }
}
