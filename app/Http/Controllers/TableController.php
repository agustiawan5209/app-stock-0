<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Customer;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function barangkeluar()
    {
        $barangkeluar = BarangKeluar::with(['transaksi', 'jenis'])->orderBy('id', 'desc')->get();

        return $barangkeluar;
    }
}
