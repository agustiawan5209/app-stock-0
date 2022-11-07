<?php

namespace Database\Seeders;

use App\Models\User;
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
                // 'alamat' => 'Jl. Masjid Raya No.70',
                // 'no_telpon' => '0818883338',
            ],
            [
                'id'=> '5',
                'name' => 'PercetakanPelangi',
                'email' => 'PercetakanPelangi@gmail.com',
                'password' => bcrypt(12345678),
                'role_id' => '2',
                // 'alamat' => 'Jl. Sungai Saddang No.79',
                // 'no_telpon' => '08114442515',
            ],
            [
                'id'=> '6',
                'name' => 'BajiPamiMarket',
                'email' => 'BajiPamiMarket@gmail.com',
                'password' => bcrypt(12345678),
                'role_id' => '2',
                // 'alamat' => 'Jl. Sultan Hasanuddin No.15 E',
                // 'no_telpon' => '0816251100',
            ],
            [
                'id'=> '7',
                'name' => 'Darwis',
                'email' => 'Darwis@gmail.com',
                'password' => bcrypt(12345678),
                'role_id' => '2',
                // 'alamat' => 'Malakaji, Kec. Tompobulu',
                // 'no_telpon' => '085244152035',
            ],
            [
                'id'=> '8',
                'name' => 'GrandTos',
                'email' => 'GrandTos@gmail.com',
                'password' => bcrypt(12345678),
                'role_id' => '3',
                // 'alamat' => 'Komplek Ruko wira, Jl. Pengayoman, Pandang, Kec.Panakukang',
                // 'no_telpon' => '081520403111',
            ],
            [
                'id'=> '9',
                'name' => 'Panorama',
                'email' => 'Panorama@gmail.com',
                'password' => bcrypt(12345678),
                'role_id' => '3',
                // 'alamat' => 'Jl. Sumba Opu no.226, Maloku, Kec. Ujung Pandang',
                // 'no_telpon' => '082342516783',
            ],
            [
                'id'=> '10',
                'name' => 'RumahMarkisa',
                'email' => 'RumahMarkisa@gmail.com',
                'password' => bcrypt(12345678),
                'role_id' => '3',
                // 'alamat' => 'Bandara Sultan Hasanuddin',
                // 'no_telpon' => '081236705244',
            ],
            [
                'id'=> '11',
                'name' => 'misiPasaraya',
                'email' => 'misiPasaraya@gmail.com',
                'password' => bcrypt(12345678),
                'role_id' => '3',
                // 'alamat' => 'Jl. Antang Raya No.5',
                // 'no_telpon' => '081257333242',
            ],
        ]);
        Customer::insert([
            ['id'=> '1',
            'customer' => 'Customer 1',
            'user_id' => '3'],
            ['id'=> '2',
            'customer' => 'Grand Toko Serba',
            'user_id' => '8'],
            ['id'=> '3',
            'customer' => 'Panorama',
            'user_id' => '9'],
            ['id'=> '4',
            'customer' => 'RumahMarkisa',
            'user_id' => '10'],
            ['id'=> '5',
            'customer' => 'misiPasaraya',
            'user_id' => '11'],
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
