<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customer;
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
    }
}
