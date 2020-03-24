<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;

class StockController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        $role = Role::where('name','super-admin')->get();
        

        $user->assignRole($role);
        return view('stocks');   
    }
}
