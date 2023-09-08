<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Jenis;
use App\Models\Transaksi;
use App\Models\StokProduk;
use App\Models\PesananUser;
use Illuminate\Http\Request;
use App\Models\ProdukFermentasi;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class ChekoutCartController extends Controller
{
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
    /**
     * receiveUser
     * Form Pembayaran User
     * @param  mixed $request
     * @return void
     */
    public function receiveUser(Request $request)
    {
        $this->validate($request, [
            'metode' => 'required',
            'bukti' => ['required', 'image', 'max:1020'],
            "tgl" => "required|date",
            "ket" => "required|string",
        ]);

        $cart = Cart::where('user_id', Auth::user()->id)->where('jumlah', '>', '0')->whereNotNull('jenis_id')->get();
        // dd($cart);
        $sum_produk = ProdukFermentasi::sum('jumlah_stock');

        // Buat Transaksi
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
        $transaksi =  Transaksi::create($transaksis);

        // Detail Transaksi Pesanan USer
        foreach ($cart as $key => $value) {
            $jenis = Jenis::find($value->jenis_id);
            // dd($jenis,$cart);
            $stokProduk = StokProduk::latest()->first();
            $sum_produk = ProdukFermentasi::sum('jumlah_stock');

            $hasil_pembelian_jumlah = ($value->jumlah * $jenis->jumlah);
            if ($stokProduk == null) {
                StokProduk::create([
                    'jenis_id' => $value->jenis_id,
                    'jumlah' => $value->jumlah,
                    'tgl_permintaan' => Carbon::now()->format('Y-m-d'),
                    'jumlah_produksi' => $sum_produk - ($hasil_pembelian_jumlah / 1000)
                ]);
            } else {
                StokProduk::create([
                    'jenis_id' => $value->item,
                    'jumlah' => $value->jumlah,
                    'tgl_permintaan' => Carbon::now()->format('Y-m-d'),
                    'jumlah_produksi' => $stokProduk->jumlah_produksi - ($hasil_pembelian_jumlah / 1000)
                ]);
            }
            $pesananUser = PesananUser::create([
                'user_id' => Auth::user()->id,
                'transaksi_id' => $transaksi->id,
                'jenis_id' => $value->jenis_id,
                'nama_jenis' => $jenis->nama_jenis,
                'jumlah' => $value->jumlah,
                'sub_total' => $jenis->harga * $value->jumlah,
                'status' => '1',
                'ket' => $request->ket,
            ]);
        }
        Alert::success("Pemesanan Berhasil", "Mohon Tunggu Konfirmasi");
        return redirect()->route('dashboard');
    }
}
