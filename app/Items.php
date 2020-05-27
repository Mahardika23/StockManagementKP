<?php

namespace App;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    //
    protected $guarded = ['id','created_at','updated_at'];
    public function getTableColumns()
    {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
    public function unit()
    {
        return $this->belongsTo('App\Unit', 'satuan_unit');
    }
    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }

    public function categories()
    {
        return $this->belongsTo('App\ItemCategory', 'kategori_barang');
    }

    public function stockOpname()
    {
        return $this->belongsToMany('App\StockOpname', 'stock_opname_details', 'item_id', 'stock_opname_id');
    }


    public function stockTransfer()
    {
        return $this->belongsToMany('App\StockTransfer', 'stock_tranfer_details', 'item_id', 'transfer_stock_id');
    }

    public function stockMovements()
    {
        return $this->belongsToMany('App\StockMovement', 'stock_tranfer_details', 'item_id', 'transfer_stock_id');
    }
    public function warehouseStocks()
    {
        return $this->belongsToMany('App\Warehouse', 'warehouse_stocks', 'item_id', 'warehouse_id')
        ->withPivot('quantity');
    }
    public function tax()
    {
        return $this->hasOne('App\Taxes', 'pajak_id');
    }
    public function scopeExclude($query, $value = array())
    {
        return $query->select(array_diff($this->getConnection()->getSchemaBuilder()
        ->getColumnListing($this->getTable()), (array)$value));
    }
}
