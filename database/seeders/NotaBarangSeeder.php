<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotaBarangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('nota_barangs')->insert([
            [
                'barang_id' => 1,
                'nota_id' => 1,
                'jumlah' => 2,
            ],
            [
                'barang_id' => 3,
                'nota_id' => 1,
                'jumlah' => 0,
            ],
            [
                'barang_id' => 4,
                'nota_id' => 2,
                'jumlah' => 1,
            ],
            [
                'barang_id' => 5,
                'nota_id' => 3,
                'jumlah' => 1,
            ],
        ]);
    }
}
