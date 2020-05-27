<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemPurchaseTransaction extends Model
{
    //
    use SoftDeletes;
    public $guarded =[];
    public function details()
    {
        return $this->belongsToMany('App\Items', 'purchase_details', 'purchase_trans_id', 'item_id')
        ->withPivot('quantity', 'harga_beli');
    }
}
