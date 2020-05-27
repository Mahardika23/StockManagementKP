<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoaMaster extends Model
{
    //
    protected $table = 'coa_master';
    protected $fillable =['code,name,coa_type'];
    public function coaType()
    {
        return $this->belongsTo('App\CoaTypes');
    }
}
