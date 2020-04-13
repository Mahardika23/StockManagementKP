<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    return [
        //
        'kode_supplier' => $faker->lexify('???-001'),// 'Hello wgt'
        'nama_supplier' => $faker->name,
        'alamat'        => $faker->address,
        'min_pembelian' => $faker->randomDigitNotNull,
        'akun_pembelian'=> $faker->numberBetween($min = 1000, $max =1999)


    ];
});
