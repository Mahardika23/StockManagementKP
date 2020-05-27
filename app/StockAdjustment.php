<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockAdjustment extends Model
{
    //
    public $guarded = [];
    public function details()
    {
        return $this->belongsToMany('App\Items', 'stock_adjustment_details', 'stock_adjustment_id', 'item_id');
    }
}
