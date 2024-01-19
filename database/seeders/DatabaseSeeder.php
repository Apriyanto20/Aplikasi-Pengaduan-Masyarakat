<?php

namespace Database\Seeders;

use App\Models\User;
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
        $dataValidasi = [
            'nik'   => '123456',
            'name'  =>  'Adi Apriyanto',
            'jenis_kelamin' =>  'Laki-laki',
            'alamat'    =>  'Cilacap',
            'notelepon' =>  '088218267306',
            'role'  =>  'Admin',
            'email' =>  'adi@gmail.com',
            'password'  => bcrypt('123456')
        ];
        User::create($dataValidasi);
    }
}
