<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoaCategories extends Model
{
    //
    protected $table = 'coa_categories';
    protected $fillable = ['nama_kategori'];

    public function CoaType(){
        return $this->hasMany('App\CoaTypes','coa_category');
    }
}
