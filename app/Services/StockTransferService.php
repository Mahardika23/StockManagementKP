<?php 
namespace App\Services;
use App\Repositories\Repository;
use App\StockTransfer;
use App\StockTransferDetails;
use App\WarehouseStocks;
use App\Items;
use App\Services\ItemService;
class StockTransferService
{
    private $model;
    private $itemServ;
    public function __construct(ItemService $itemserv,StockTransfer $stocktrf){
        $this->itemServ = $itemserv;
        $this->model = new Repository($stocktrf);
    }
    public function all(){
        return $this->model->all();
    }
    public function make($data){
        $itemId = $data['item_id'];
        $newStockTrf = new StockTransfer;
        $created = $newStockTrf::create([
            'kode_transfer' => $data['kode_transfer'],
            'gudang_asal'   => $data['gudang_asal'],
            'gudang_tujuan' => $data['gudang_tujuan'],
            'deskripsi'     => $data['deskripsi'],
            'departemen'    => $data['departemen'],
        ]);

        $stocksData = [
            'asal'      => $created['gudang_asal'],
            'tujuan'    => $created['gudang_tujuan'],
            'item_id'   => $itemId,
            'quantity'  => $data['qty']
        ];

        $condition = 0;
        foreach($itemId as $index => $id){
            $from = $stocksData['asal'];
            $to = $stocksData['tujuan'];
            $qtyFrom = $this->itemServ->getStocksQtyByWhouse($stocksData['asal'],$id);
            $qtyDestination = $this->itemServ->getStocksQtyByWhouse($stocksData['tujuan'],$id);
            $qtyFrom = $qtyFrom-$stocksData['quantity'][$index];
            $qtyDestination += $stocksData['quantity'][$index];
            if ($qtyFrom >= 0) {
                # code...
                $this->itemServ->updateStocks($id,$from,$qtyFrom);
                $this->itemServ->updateStocks($id,$to,$qtyDestination);                
            }
            else {
                $condition = 1;
            }
           

            $created->items()->attach($id,['quantity' => $data['qty'][$index]]);
        }
        if ($condition == 1) {
            return 400;
        }

        return $newStockTrf;
    }
//     $user = App\User::find(1);

// $user->roles()->attach($roleId);

}



?>