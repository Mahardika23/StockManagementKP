<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ItemService;
use App\StockAdjustment;
use App\Http\Requests\CreateStockAdjustmentRequest;
use Illuminate\Support\Facades\DB;

class StockAdjustmentController extends Controller
{
    //
    public function __construct(){

    }

    public function store(CreateStockAdjustmentRequest $req,ItemService $itemServ)
    {
        //Make Transaction Record
        $input = $req->validated();
        $stockAdjust = new StockAdjustment;
        $transData = $req->except(['item_id','quantity_diff']);
        $stockAdjust = StockAdjustment::findOrFail($stockAdjust->create($transData)->id);
        
        $qtyDiff = $input['quantity_diff'];
        $itemId = $input['item_id'];
        $whouseId = $input['warehouse_id'];
            foreach ($itemId as $index => $id) {

                $onBook = $itemServ->getStocksQtyByWhouse($whouseId,$id); 
                $newQty = $onBook + $qtyDiff[$index];
                $itemServ->updateStocks($id,$whouseId,$newQty);
    
                $stockAdjust->details()->attach($id,[
                    'quantity_diff'   => $qtyDiff[$index],
                ]);
    
            }
       
        return $stockAdjust;
              


    }
}
