<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $guarded = [];
    public function items()
    {
        return $this->hasMany('App\Items', 'supplier_id');
    }
}
