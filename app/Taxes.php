<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxes extends Model
{
    //
    protected $table ='taxes';
    protected $fillable = ['nama','rate'];
    public function item()
    {
        return $this->belongsTo('App\Items', 'pajak_id');
    }
}
