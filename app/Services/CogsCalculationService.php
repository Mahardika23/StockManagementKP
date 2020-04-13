<?php
namespace App\Services;
use App\Item;
use Carbon\Carbon;
use App\ItemPurchaseTransaction;
class CogsCalculationService{
    public function handle($stock,$stockCogs){
        /*
            1. Get Purchase Transactions
        */
        $cogs = 0;  


        $itemsThisMonth = Item::whereMonth('created_at','=',Carbon::now()->month);

        if ($configs->invent_mgmt_method == "FIFO") {
        # COGS = item value at start
            $itemTrans = ItemPurchaseTransaction::orderBy('created_at','ASC')->get();
                

        }
        elseif ($configs->invent_mgmt_method == "LIFO") {
            # code...
        }
        elseif ($configs->invent_mgmt_method == "Average") {
            # code...
        }
        else{
            return 204;
        }
    }





}


?>
