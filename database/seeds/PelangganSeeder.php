<?php

use Illuminate\Database\Seeder;
class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Pelanggan::class, 50)->create();
    }
}
