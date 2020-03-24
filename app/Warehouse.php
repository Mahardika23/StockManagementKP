<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    //
    public function items(){
        return $this->belongsToMany('App\Items','item_stocks','warehouse_id','item_id');
    }

}
