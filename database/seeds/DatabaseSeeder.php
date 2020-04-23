<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesAndPermissionSeeder::class,
            KategoriBarangSeeder::class,
            SupplierSeeder::class,
            UnitSeeder::class,
            WarehouseSeeder::class,
            TaxSeeder::class,
            COASeeder::class,
            ItemSeeder::class,
            MethodSeeder::class,

        ]);
    }
}
