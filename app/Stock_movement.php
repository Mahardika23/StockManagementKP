<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock_movement extends Model
{
    //
    public function MovementType(){
        return $this->belongsTo('App\StockMovementType','kode_jenis_pergerakan');
    }
}
