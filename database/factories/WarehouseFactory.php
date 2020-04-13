<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Warehouse;
use Faker\Generator as Faker;

$factory->define(Warehouse::class, function (Faker $faker) {
    return [
        'kode_gudang' => $faker->word,
        'alamat'      => $faker->address,
        'no_telp'     => $faker->phoneNumber,
        'status'      => 'aktif',
        //
    ];
});
