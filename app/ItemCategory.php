<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    //
    public $guarded = ['akun'];
   
    public function items()
    {
        return $this->hasMany('App\Items', 'kategori_barang');
    }
}
