<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockOpname extends Model
{
    //

    public function details(){
        return $this->belongsToMany('App\Items','stock_opname_details','stock_opname_id','item_id');

    }
}       
 