<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    //
    public function index(){
        $permission = Permission::all();
        $roles = Role::all();
        return view('configure',compact('permission','roles'));

    }
    public function updatePermissions(Request $r){
        $userInput = $r->input();
        $permissions = $userInput['permissions'];
        $role = Role::find($userInput['user_role']);

        $role->syncPermissions($permissions);
        return redirect()->back();
    }
    
    public function getRolePermissions($id){
        $rolePermissions = Role::find($id)->permissions;
        return $rolePermissions;
    }
    public function addRole(Request $r){
        // dd($r->input());
        foreach ($r['name'] as $name) {
            # code...
            Role::create(['name' =>$name ]);

        }
        return redirect()->back();

    }
}
