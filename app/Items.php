<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    //
    protected $guarded = ['created_at','updated_at'];
    public function unit(){
        return $this->belongsTo('App\Unit','satuan_unit');

        
    }
    public function supplier(){
        return $this->belongsTo('App\Supplier');

    }

    public function categories(){
        return $this->belongsTo('App\ItemCategory','kategori_barang');

    }

    public function stockOpname(){
        return $this->belongsToMany('App\StockOpname','stock_opname_details','item_id','stock_opname_id');

    }


    public function stockTransfer(){
        return $this->belongsToMany('App\StockTransfer','stock_tranfer_details','item_id','transfer_stock_id');

    }

    public function stockMovements(){
        return $this->belongsToMany('App\Stock_movement','stock_tranfer_details','item_id','transfer_stock_id');

    }

}
