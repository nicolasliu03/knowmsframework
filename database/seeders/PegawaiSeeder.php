<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pegawais')->insert([
            [
                'nama' => 'Administrator',
                'usia' => 25,
                'email' => 'admin@gmail.com',
                'telepon' => '081234567890',
                'alamat' => 'Surabaya',
            ],
            [
                'nama' => 'Budi',
                'usia' => 30,
                'email' => 'budi@gmail.com',
                'telepon' => '081234567891',
                'alamat' => 'Sidoarjo',
            ],
            [
                'nama' => 'Citra',
                'usia' => 28,
                'email' => 'citra@gmail.com',
                'telepon' => '081234567892',
                'alamat' => 'Gresik',
            ],
        ]);
    }
}
