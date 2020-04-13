<?php

use Illuminate\Database\Seeder;

class COASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('coa_categories')->insert([
            'nama_kategori' => 'Assets'
        ]);
        DB::table('coa_categories')->insert([
            'nama_kategori' => 'Liability'
        ]);
        DB::table('coa_categories')->insert([
            'nama_kategori' => 'Equity'
        ]);
        DB::table('coa_types')->insert([
            'coa_type'     => 'inventory',
            'coa_category' => '1'
            
        ]);
        DB::table('coa_master')->insert([
            'code'     => '1111',
            'coa_type' => '1',
            'name'     => 'Inventory Out',

            
        ]);
    }
}
