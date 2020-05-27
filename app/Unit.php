<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
    protected $fillable = ['nama_satuan'];
    public function items()
    {
        return $this->hasMany('App\Items', 'satuan_unit');
    }
}
