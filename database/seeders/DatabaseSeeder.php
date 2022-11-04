<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BahanBaku;
use App\Models\BahanBakuKemasan;
use App\Models\Customer;
use App\Models\Jenis;
use App\Models\Satuan;
use App\Models\StockBahanBaku;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        BahanBaku::insert([
            ['nama_bahan_baku' => 'Markisa'],
            ['nama_bahan_baku' => 'Gula Pasir'],
            ['nama_bahan_baku' => 'Air Mineral'],
            ['nama_bahan_baku' => 'Na Benzoat'],
            ['nama_bahan_baku' => 'C.M.C'],
        ]);
        BahanBakuKemasan::insert([
            ['nama_bahan_baku' => 'Tutup Botol'],
            ['nama_bahan_baku' => 'Dos'],
            ['nama_bahan_baku' => 'Label'],
            ['nama_bahan_baku' => 'Tali'],
        ]);
        Satuan::insert([
            ['nama_satuan' => 'KG'],
            ['nama_satuan' => 'Galon/ 5 Liter'],
            ['nama_satuan' => 'Gram'],
            ['nama_satuan' => 'Box'],
            ['nama_satuan' => 'Biji'],
            ['nama_satuan' => 'Bungkus'],
        ]);
        Jenis::insert([
            ['nama_jenis' => '500ml', 'harga' => '35000'],
            ['nama_jenis' => '600ml', 'harga' => '45000'],
            ['nama_jenis' => '1000ml', 'harga' => '67500'],
            ['nama_jenis' => '1000ml x botol ungu (serat)', 'harga' => '90000'],
            ['nama_jenis' => '500ml x botol ungu (serat)', 'harga' => '90000'],
        ]);
        $this->call([
            UserSeeder::class,
            BahanBakuSeeder::class,
        ]);
    }
}
