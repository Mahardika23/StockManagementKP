<?php

use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('units')->insert([
            'kode_satuan' => 'BX',
            'nama_satuan' => 'Box'
        ]);
        DB::table('units')->insert([
            'kode_satuan' => 'PCS',
            'nama_satuan' => 'Pieces'
        ]);
        DB::table('units')->insert([
            'kode_satuan' => 'PCKG',
            'nama_satuan' => 'Packages'
        ]);
        DB::table('units')->insert([
            'kode_satuan' => 'CUP',
            'nama_satuan' => 'Cups'
        ]);
    }
}
