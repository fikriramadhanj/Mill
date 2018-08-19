<?php

use Faker\Generator as Faker;

$factory->define(App\Pelanggan::class, function (Faker $faker) {
    $npwp = $faker->numerify('##.###.###.#-###.###');    

    return [
        'kode_pelanggan' => $faker->unique()->numberBetween($min = 1, $max = 1000),
        'nama_pelanggan' => $faker->name,
        'alamat' => $faker->address,
        'kota' => $faker->city,
        'kode_pos' => $faker->postcode,
        'no_telp' => $faker->e164PhoneNumber,
        'fax' => $faker->e164PhoneNumber,
        'kontak_person' => $faker->e164PhoneNumber,
        'limit_hutang' => (int)$faker->numberBetween($min = 10000, $max = 1000000),
        'default_tempo' => (int)$faker->numberBetween($min = 1, $max = 20),
        'npwp' => $npwp,
        'nppkp' => $npwp
    ];
});
