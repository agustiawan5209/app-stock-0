<?php

namespace Database\Seeders;

use App\Models\StockBahanBaku;
use Illuminate\Database\Seeder;
use App\Models\BahanBakuKemasan;
use App\Models\StockBahanBakuKemasan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BahanBakuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stock_bahan_baku_kemasans = array(
            array(
                "id" => 1,
                "bahan_baku_id" => 1,
                "stock" => 1000,
                "satuan_id" => 5,
                "max" => 1,
                "created_at" => "2022-11-04 21:31:27",
                "updated_at" => "2022-11-04 21:33:24",
            ),
            array(
                "id" => 2,
                "bahan_baku_id" => 2,
                "stock" => 1111,
                "satuan_id" => 5,
                "max" => 1,
                "created_at" => "2022-11-04 21:31:42",
                "updated_at" => "2022-11-04 21:33:32",
            ),
            array(
                "id" => 3,
                "bahan_baku_id" => 3,
                "stock" => 110,
                "satuan_id" => 5,
                "max" => 1,
                "created_at" => "2022-11-04 21:31:55",
                "updated_at" => "2022-11-04 21:33:39",
            ),
            array(
                "id" => 4,
                "bahan_baku_id" => 4,
                "stock" => 100,
                "satuan_id" => 5,
                "max" => 1,
                "created_at" => "2022-11-04 21:32:19",
                "updated_at" => "2022-11-04 21:33:46",
            ),
        );
        StockBahanBakuKemasan::insert($stock_bahan_baku_kemasans);
        $stock_bahan_bakus = array(
            array(
                "id" => 1,
                "bahan_baku_id" => 1,
                "stock" => 20,
                "satuan_id" => 1,
                "max" => 8,
                "created_at" => "2022-10-07 20:30:52",
                "updated_at" => "2022-10-07 21:14:09",
            ),
            array(
                "id" => 2,
                "bahan_baku_id" => 2,
                "stock" => 20,
                "satuan_id" => 1,
                "max" => 1,
                "created_at" => "2022-10-07 20:32:30",
                "updated_at" => "2022-10-07 21:14:09",
            ),
            array(
                "id" => 3,
                "bahan_baku_id" => 3,
                "stock" => 20,
                "satuan_id" => 2,
                "max" => 5,
                "created_at" => "2022-10-07 20:32:43",
                "updated_at" => "2022-10-07 21:14:09",
            ),
            array(
                "id" => 4,
                "bahan_baku_id" => 4,
                "stock" => 20,
                "satuan_id" => 3,
                "max" => 2,
                "created_at" => "2022-10-07 20:32:51",
                "updated_at" => "2022-10-07 21:14:09",
            ),
            array(
                "id" => 5,
                "bahan_baku_id" => 5,
                "stock" => 20,
                "satuan_id" => 3,
                "max" => 3,
                "created_at" => "2022-10-07 20:33:06",
                "updated_at" => "2022-10-07 21:14:09",
            ),
        );

        StockBahanBaku::insert($stock_bahan_bakus);
    }
}
