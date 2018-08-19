<?php

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
        $this->call([
            TipeBarangSeeder::class,
            PelangganSeeder::class,

            // After Tipe Barang,
            BarangSeeder::class
        ]);
    }
}
