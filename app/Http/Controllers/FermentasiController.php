<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukFermentasi;
use App\Models\StockBahanBaku;
use App\Models\StokProduk;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class FermentasiController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'kode' => ['required', 'string'],
            'jumlah_stock' => ['required', 'integer'],
            'tgl_frementasi' => ['required', 'date'],
        ]);
        $id = $request->id;
        $max = $request->max;
        $stock = $request->stock;
        $data = [];
        // Perhitungan Stock
        for ($i = 0; $i < count($request->id); $i++) {
            $stock = StockBahanBaku::find($id[$i]);

            $stock->update([
                'stock' => $stock->stock - $stock->max * $request->jumlah_stock,
            ]);
            $data[] = $stock->stock - $stock->max * $request->jumlah_stock;
        }
        // dd($data);
        $id = implode(',', $id);
        $max = implode(',', $max);
        $stock = implode(',', $data);
        $produk = ProdukFermentasi::whereDate('tgl_frementasi', Carbon::now()->format('Y-m-d'))->get();

        if ($produk->count() > 0) {
            foreach ($produk as $item) {
                $hasil_hitung = $request->jumlah_stock * 3.5;
                $hasil_fer =  $hasil_hitung + $item->jumlah_stock;

                ProdukFermentasi::find($item->id)->update([
                    'jumlah_stock' => $hasil_fer,
                ]);
                $stokProduk = StokProduk::latest()->first();
                $sum_produk = ProdukFermentasi::sum('jumlah_stock');
                StokProduk::create([
                    'tgl_permintaan' => $request->tgl_frementasi,
                    'jumlah_produksi' => $stokProduk == null ? $hasil_hitung : $sum_produk,
                ]);
            }
        } else {
            $hasil_hitung = $request->jumlah_stock * 3.5;
            ProdukFermentasi::create([
                'kode' => $request->kode,
                'jumlah_stock' => $hasil_hitung,
                'status' => '1',
                'tgl_frementasi' => $request->tgl_frementasi,
                'data' =>  $stock,
            ]);
            $stokProduk = StokProduk::latest()->first();
            $sum_produk = ProdukFermentasi::sum('jumlah_stock');
            StokProduk::create([
                'tgl_permintaan' => $request->tgl_frementasi,
                'jumlah_produksi' => $stokProduk == null ? $hasil_hitung : $stokProduk->jumlah_produksi, //Stok Produk Jumlah
            ]);
        }

        Alert::info('Info', 'Berhasil Di Simpan');
        return redirect()->route('Admin.Produk-Fermentasi');
        // return $request;
    }
    public function edit($id, Request $request)
    {
        $this->validate($request, [
            'kode' => ['required', 'string'],
            'jumlah' => ['required', 'numeric'],
            'tgl_frementasi' => ['required', 'date'],
        ]);
        return [$request->all(), $id];
        ProdukFermentasi::where('id', $id)->update([
            'kode' => $request->kode,
            'jumlah_stock' => $request->jumlah_stock,
            'tgl_frementasi' => $request->tgl_frementasi,
        ]);
    }
}
