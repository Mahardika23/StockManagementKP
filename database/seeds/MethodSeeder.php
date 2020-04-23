<?php

use Illuminate\Database\Seeder;


class MethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('inventory_method')->insert([
            'name' =>'FIFO'
        ]);
        DB::table('inventory_method')->insert([
            'name' =>'LIFO'
        ]);
        DB::table('inventory_method')->insert([
            'name' =>'Average'
        ]);
        
    }
}
