<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BahanBaku;
use App\Models\Customer;
use App\Models\Jenis;
use App\Models\Satuan;
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
        \App\Models\RoleId::insert([
            [
                'name_role'=> 'Admin'
            ],
            [
                'name_role'=>'Supplier'
            ],
            [
                'name_role'=>'Customer'
            ]
        ]);

        \App\Models\User::insert([
            ['name' => 'Admin',
            'email' => 'Admin@Super.com',
            'password'=> bcrypt(12345678),
            'role_id'=> '1',
        ],
            ['name' => 'Supplier',
            'email' => 'Supplier@gmail.com',
            'password'=> bcrypt(12345678),
            'role_id'=> '2',
        ],
            ['name' => 'Customer',
            'email' => 'Customer@gmail.com',
            'password'=> bcrypt(12345678),
            'role_id'=> '3',
            ]
        ]);
        Customer::insert([
            'customer'=> 'Customer 1',
            'user_id'=> '3'
        ]);
        Supplier::insert([
            'supplier'=> 'supplier 1',
            'user_id'=> '2'
        ]);

        BahanBaku::insert([
            ['nama_bahan_baku'=> 'Markisa'],
            ['nama_bahan_baku'=> 'Gula Pasir'],
            ['nama_bahan_baku'=> 'Air Mineral'],
            ['nama_bahan_baku'=> 'Na Benzoat'],
            ['nama_bahan_baku'=> 'C.M.C'],
        ]);
        Satuan::insert([
            ['nama_satuan'=> 'KG'],
            ['nama_satuan'=> 'Galon/ 5 Liter'],
        ]);
        Jenis::insert([
            ['nama_jenis'=> '500ml', 'harga'=> '35000'],
            ['nama_jenis'=> '600ml', 'harga'=> '45000'],
            ['nama_jenis'=> '1000ml', 'harga'=> '67500'],
            ['nama_jenis'=> '1000ml x botol ungu (serat)', 'harga'=> '90000'],
            ['nama_jenis'=> '500ml x botol ungu (serat)', 'harga'=> '90000'],
        ]);
    }
}
