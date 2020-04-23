<?php

namespace App\Http\Controllers;

use App\StockOpname;
use App\Services\ItemService;
use App\Services\StockOpnameService;
use Illuminate\Http\Request;
use App\Services\InventoryLedgerService;
use Illuminate\Support\Facades\DB;

class StockOpnameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StockOpnameService $opnameServ,ItemService $itemServ,Request $req)
    {
        //

        $opnameItems = $req->input();
        
        $transData = $req->except('item_id','on_hand');
        $stockOp = StockOpname::findOrFail($opnameServ->makeTransJournal($transData));
        

        $itemId = $opnameItems['item_id'];
        $whouseId = $opnameItems['gudang_id'];
    
        foreach ($itemId as $index => $id) {
            $onBook = $itemServ->getStocksQtyByWhouse($opnameItems['gudang_id'],$id); 
            $itemServ->updateStocks($id,$whouseId,$opnameItems['on_hand'][$index]);

            $stockOp->details()->attach($id,[
                'jumlah_tercatat' => $onBook,
                'jumlah_fisik'    => $opnameItems['on_hand'][$index]
            ]);

        }    
    
        
        
        return $stockOp;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StockOpname  $stockOpname
     * @return \Illuminate\Http\Response
     */
    public function posting(InventoryLedgerService $invLedg,$id)
    {
        //
        $stockOpname = new StockOpname;

        // return $invLedg->posting($stockOpname->with('details')->where('id',$id)->get());
        return 201;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StockOpname  $stockOpname
     * @return \Illuminate\Http\Response
     */
    public function edit(StockOpname $stockOpname)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StockOpname  $stockOpname
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StockOpname $stockOpname)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StockOpname  $stockOpname
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockOpname $stockOpname)
    {
        //
    }
}
