<?php 
namespace App\Services;
use App\StockOpname;
use App\Repositories\Repository;

class StockOpnameService
{
    private $stockOp;
    public function __construct(){

    }
    public function makeTransJournal($data){
        $this->stockOp = new StockOpname;
        $stockOp->gudang_id = $input['gudang_id'];
        $stockOp->deskripsi = $input['deskripsi'];
        $stockOp->departemen = $input['departemen'];
       
        $this->stockOp->save();
        
        // $stockOp->save();

    }

    public function editTrans($data,$id){

    }
}




?>