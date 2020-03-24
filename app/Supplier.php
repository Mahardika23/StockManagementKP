<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    public function items(){
        return $this->hasMany('App\Items','supplier_id');
    }
}
