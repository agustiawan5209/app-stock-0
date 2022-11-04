<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\RoleId::insert([
            [
                'name_role' => 'Admin'
            ],
            [
                'name_role' => 'Supplier'
            ],
            [
                'name_role' => 'Customer'
            ]
        ]);

        \App\Models\User::insert([
            [
                'id'=> '1',
                'name' => 'Admin',
                'email' => 'Admin@Super.com',
                'password' => bcrypt(12345678),
                'role_id' => '1',
            ],
            [
                'id'=> '2',
                'name' => 'Supplier',
                'email' => 'Supplier@gmail.com',
                'password' => bcrypt(12345678),
                'role_id' => '2',
            ],
            [
                'id'=> '3',
                'name' => 'Customer',
                'email' => 'Customer@gmail.com',
                'password' => bcrypt(12345678),
                'role_id' => '3',
            ],
            [
                'id'=> '4',
                'name' => 'Sumber_Plastik',
                'email' => 'SumberPlastik@gmail.com',
                'password' => bcrypt(12345678),
                'role_id' => '2',
            ],
            [
                'id'=> '5',
                'name' => 'PercetakanPelangi',
                'email' => 'PercetakanPelangi@gmail.com',
                'password' => bcrypt(12345678),
                'role_id' => '2',
            ],
            [
                'id'=> '6',
                'name' => 'BajiPamiMarket',
                'email' => 'BajiPamiMarket@gmail.com',
                'password' => bcrypt(12345678),
                'role_id' => '2',
            ],
            [
                'id'=> '7',
                'name' => 'Darwis',
                'email' => 'Darwis@gmail.com',
                'password' => bcrypt(12345678),
                'role_id' => '2',
            ],
        ]);
        Customer::insert([
            'id'=> '1',
            'customer' => 'Customer 1',
            'user_id' => '3'
        ]);
        Supplier::insert([
            [
                'id'=> '1',
                'supplier' => 'supplier 1',
                'user_id' => '2'
            ],
            [
                'id'=> '2',
                'supplier' => 'Sumber_Plastik',
                'user_id' => '4'
            ],
            [
                'id'=> '3',
                'supplier' => 'PercetakanPelangi',
                'user_id' => '5'
            ],
            [
                'id'=> '4',
                'supplier' => 'BajiPamiMarket',
                'user_id' => '6'
            ],
            [
                'id'=> '5',
                'supplier' => 'Darwis',
                'user_id' => '7'
            ],
        ]);

    }
}
