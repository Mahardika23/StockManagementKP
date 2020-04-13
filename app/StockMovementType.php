<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockMovementType extends Model
{
    //
    public function stockMovement(){
        return $this->hasMany('App\StockMovement','kode_jenis_pergerakan');

    }
}
