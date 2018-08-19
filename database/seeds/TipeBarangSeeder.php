<?php

use Illuminate\Database\Seeder;
use App\TipeBarang;

class TipeBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipeBarang = [
            'Batuan',
            'Bahan Kimia'
        ];

        foreach ($tipeBarang as $tipe) {
            TipeBarang::create([
                'nama_tipe' => $tipe
            ]);
        }
    }
}
