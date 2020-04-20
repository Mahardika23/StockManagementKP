<?php 

namespace App\Services;
use App\Repositories\Repository;
use App\Items;
class ItemService{
    protected $model;
    public function __construct(Items $items){
    //   $this->model = new Repository($items);
    }
    public function all (){
        return Items::all();
    }
    public function create($data){
        $this->model = new Items;
        $this->model->save($data);
        return $this->model;
    }
    public function getStocksQty($itemId){
        $theItem = Items::find($itemId);
        $items = Items::find($itemId)->WarehouseStocks;
        $qtySum = 0;
        // return $items;
        foreach ($items as $i) {
            $qtySum += $i->pivot->quantity;
            # code...

        }
        return [
            'id'        => $theItem->id, 
            'name'      => $theItem->nama_barang,
            'quantity'  => $qtySum
        ];
        
    }
    public function getStocksByWhouse($id,$whsId){
        return Items::find($id)->warehouseStocks()->wherePivot('warehouse_id',$whsId);
        
    }
    public function getStocksQtyByWhouse($whsId,$itemId){
        return $this->getStocksByWhouse($itemId,$whsId)->first()->pivot->quantity;
         
    }
    public function updateStocks($itemId,$whsId,$qty){
        
        $itemStock = $this->getStocksByWhouse($itemId,$whsId);
        $itemStock->updateExistingPivot($whsId,['quantity'=>$qty]);
        return 201;


    }
     public function delete($id){
        
    }
}


?>