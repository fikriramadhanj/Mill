<?php

use Faker\Generator as Faker;

$factory->define(App\Barang::class, function (Faker $faker) {
    $tipeBarang = App\TipeBarang::all()->pluck('id');
    $hargaBeli = (int)($faker->numberBetween($min = 1, $max = 99)) * 1000;
    $hargaJual = (int)($faker->numberBetween($min = ceil($hargaBeli / 1000), $max = 99)) * 1000;
    return [
        'tgl_beli' => $faker->dateTimeThisMonth($max = 'now', $timezone = 'Asia/Jakarta'),
        'kode_barang' => $faker->unique()->numberBetween($min = 1, $max = 1000),
        'nama' => $faker->word,
        'berat' => 1,
        'harga_beli' => $hargaBeli,
        'harga_jual1' => $hargaJual,
        'harga_jual2' => $hargaJual,
        'harga_jual3' => $hargaJual,
        'harga_jual4' => $hargaJual,
        'harga_jual5' => $hargaJual,
        'qty' => 1,
        'tipe_id' => $faker->randomElement($tipeBarang)
    ];
});
