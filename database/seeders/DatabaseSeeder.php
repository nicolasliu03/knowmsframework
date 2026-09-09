<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            KategoriSeeder::class,
            BarangSeeder::class,
            PegawaiSeeder::class,
            PelangganSeeder::class,
            NotaSeeder::class,
            NotaBarangSeeder::class,
        ]);
    }
}
