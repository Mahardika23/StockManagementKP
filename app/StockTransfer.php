<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockTransfer extends Model
{
    //
    // public function roles()
    // {
    //     return $this->belongsToMany('App\Role', 'role_user_table', 'user_id', 'role_id');
    // }
    public $guarded=['id'];
    public function items(){
        {
            return $this->belongsToMany('App\Items', 'stock_transfer_details', 'transfer_stock_id', 'item_id');
        }
    }
}
