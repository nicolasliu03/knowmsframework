<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('notas')->insert([
            [
                'tanggal' => '2026-09-01',
                'total' => 30000,
                'pegawai_id' => 1,
                'pelanggan_id' => 1,
            ],
            [
                'tanggal' => '2026-09-02',
                'total' => 17000,
                'pegawai_id' => 2,
                'pelanggan_id' => 2,
            ],
            [
                'tanggal' => '2026-09-03',
                'total' => 150000,
                'pegawai_id' => 3,
                'pelanggan_id' => 3,
            ],
        ]);
    }
}
