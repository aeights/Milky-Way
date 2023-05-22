<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'nama_lengkap'=>'Penjual 1',
            'email'=>'penjual1@gmail.com',
            'username'=>'penjual1',
            'password'=>Hash::make('111111'),
            'nomor_telepon'=>'0881',
            'alamat'=>'Jember',
            'tanggal_lahir'=>'2222-02-02',
            'jenis_kelamin'=>'Laki-laki',
            'role'=>'penjual',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
