<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukFermentasi;
use App\Models\StockBahanBaku;
use RealRashid\SweetAlert\Facades\Alert;

class FermentasiController extends Controller
{
    public function create(Request $request)
    {
        $id = $request->id;
        $max = $request->max;
        $stock = $request->stock;

        // Perhitungan Stock
        for ($i = 0; $i < count($request->id); $i++) {
            $stock = StockBahanBaku::find($id[$i]);

            $stock->update([
                'stock' => $stock->stock - $stock->max * $request->jumlah_stock,
            ]);
        }
        $id = implode(',', $id);
        $max = implode(',', $max);
        $stock = implode(',', $stock);
        ProdukFermentasi::create([
            'kode' => $request->kode,
            'jumlah_stock' => $request->jumlah_stock,
            'status' => '1',
            'tgl_frementasi' => $request->tgl_frementasi,
            'data'=> $id ."/". $max ."/".$stock,
        ]);
        $this->itemAdd = false;
        Alert::info('Info', 'Berhasil Di Simpan');
        return redirect()->route('Admin.Produk-Fermentasi');
    }
}
