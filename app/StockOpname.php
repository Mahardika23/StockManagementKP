<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockOpname extends Model
{
    //
    use SoftDeletes;    
    public $guarded = [];
    public function details(){
        return $this->belongsToMany('App\Items','stock_opname_details','stock_opname_id','item_id');

    }
}       
 