<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Role::create(['name' => 'warehouse-operator']);
       $superadmin = Role::create(['name' => 'super-admin']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'warehouse-management']);
        Role::create(['name' => 'accountant']);
        
        
        Permission::create(['name' => 'create item_categories']);
        Permission::create(['name' => 'edit opname']);
        Permission::create(['name' => 'publish stocks']);
        Permission::create(['name' => 'unpublish stocks']);

        
        $superadmin->givePermissionTo(Permission::all());

    }
}
