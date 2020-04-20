<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryLedger extends Model
{
    //
    use SoftDeletes;
    public $guarded = [];
    
    // public function trans (){
    //     return $this->belongsToMany('App\JournalTransaction','')
    // }

}

