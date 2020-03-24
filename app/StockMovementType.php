<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockMovementType extends Model
{
    //
    public function stockMovement(){
        return $this->hasMany('App\Stock_movement','kode_jenis_pergerakan');

    }
}
