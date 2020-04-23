<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('warehouse_stocks')->insert([
            'warehouse_id' => '1',
            'item_id'   => '1',
            'quantity'     => '0'
        ]);
        DB::table('warehouse_stocks')->insert([
            'warehouse_id' => '2',
            'item_id'   => '1',
            'quantity'     => '30'
        ]);
        DB::table('warehouse_stocks')->insert([
            'warehouse_id' => '1',
            'item_id'   => '2',
            'quantity'     => '0'
        ]);
        DB::table('warehouse_stocks')->insert([
            'warehouse_id' => '2',
            'item_id'   => '2',
            'quantity'     => '50'
        ]);
        DB::table('warehouse_stocks')->insert([
            'warehouse_id' => '1',
            'item_id'   => '3',
            'quantity'     => '0'
        ]);

        factory(App\Items::class, 20)->create();

    }
}
