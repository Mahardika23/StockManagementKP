<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoaTypes extends Model
{
    //
    protected $table ='coa_types';
    protected $fillable = ['coa_category','coa_type'];
    public function category()
    {
        return $this->belongsTo('App\CoaCategories', 'coa_category');
    }
    public function chart()
    {
        return $this->hasMany('App\CoaMaster', 'coa_type');
    }
}
