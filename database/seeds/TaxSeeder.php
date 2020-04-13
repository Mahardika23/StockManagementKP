<?php

use Illuminate\Database\Seeder;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //
       DB::table('taxes')->insert([
        'nama' => 'PPN',
        'rate' => '0.01'
    ]);
    DB::table('taxes')->insert([
        'nama' => 'pph',
        'rate' => '0.1'
    ]);
    }
}
