<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockMovement extends Model
{
    //
    use SoftDeletes;
    public function MovementType(){
        return $this->belongsTo('App\StockMovementType','kode_jenis_pergerakan');
    }
}
