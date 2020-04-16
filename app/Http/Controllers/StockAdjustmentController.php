<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ItemService;
use App\StockAdjustment;
use App\Http\Requests\CreateStockAdjustmentRequest;

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
        $stockAdjust->warehouse_id = $input['warehouse_id'];
        $stockAdjust->akun_persediaan = $input['akun_persediaan'];
        $stockAdjust->deskripsi = $input['deskripsi'];
        $stockAdjust->save();

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
