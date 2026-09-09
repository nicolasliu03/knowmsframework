<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelangganSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pelanggans')->insert([
            [
                'nama' => 'Andi',
                'usia' => 22,
                'alamat' => 'Surabaya',
                'email' => 'andi@gmail.com',
                'telepon' => '081234567893',
            ],
            [
                'nama' => 'Dina',
                'usia' => 25,
                'alamat' => 'Malang',
                'email' => 'dina@gmail.com',
                'telepon' => '081234567894',
            ],
            [
                'nama' => 'Eko',
                'usia' => 27,
                'alamat' => 'Mojokerto',
                'email' => 'eko@gmail.com',
                'telepon' => '081234567895',
            ],
        ]);
    }
}
