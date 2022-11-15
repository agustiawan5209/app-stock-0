<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use App\Models\StockBahanBaku;
use App\Models\StockBahanBakuKemasan;

class LaporanController extends Controller
{
    //

    public function penjulan(Request $request)
    {
        $pdf = Pdf::loadView('laporan.penjualan', $request);
        return $pdf->stream('invoice.pdf');
    }
    public function barangmasuk(Request $request)
    {
        $barangmasuk = BarangMasuk::with(['pesanan', 'pesanan.transaksi'])
        ->whereHas('pesanan', function($query) use ($request){
            return $query->whereHas('transaksi', function($query) use ($request){
                return $query->whereBetween('tgl_transaksi', [$request->tgl_awal, $request->tgl_akhir]);
            });
        })
        ->get();
        $pdf = PDF::loadView('laporan.barangmasuk', ['barangmasuk'=>$barangmasuk ]);
        return $pdf->stream('laporanbarangmasuk');
    }
    public function barangkeluar(Request $request)
    {
        return $request;
    }
    public function stok(Request $request)
    {
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;
        $data['produksi']= StockBahanBaku::all();
        $data['kemasan']= StockBahanBakuKemasan::all();
        $pdf = PDF::loadView('laporan.stok', ['data'=>$data]);
        return $pdf->stream('invoice.pdf');
    }
}
