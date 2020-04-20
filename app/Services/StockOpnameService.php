<?php 
namespace App\Services;
use App\StockOpname;
use App\Repositories\Repository;

class StockOpnameService
{
    private $stockOp;
    public function __construct(StockOpname $stockop){
        $this->stockOp = new Repository($stockop);

    }
    public function makeTransJournal($data){
        
        return $this->stockOp->create($data)->id;
       

    }

    public function editTrans($data,$id){

    }
}




?>