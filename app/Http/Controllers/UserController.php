<?php

namespace App\Http\Controllers;

use App\Models\StockBahanBaku;
use App\Models\StockBahanBakuKemasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cekUser()
    {
        if (Auth::user()->roles->id == '1') {
            return redirect()->route('Admin.Dashboard-Admin');
        }

        if (Auth::user()->roles->id == '2') {
            return redirect()->route('Supplier.Dashboard-Supplier');
        }

        if (Auth::user()->roles->id == '3') {
            return redirect()->route('Customer.Dashboard-Admin');
        } else {
            abort(401);
        }
    }
    public function cekStok(){
        $stok['produksi'] = StockBahanBaku::where('stock', '>', '50')->get();
        $stok['kemasan'] = StockBahanBakuKemasan::where('stock', '<', '50')->get();

        return $stok;
    }
}
