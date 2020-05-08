<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;

use App\StockOpname;
use App\Services\ItemService;
use App\Services\StockOpnameService;
use Illuminate\Http\Request;
use App\Services\InventoryLedgerService;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StockOpnameRequest;

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
        $stokOp = StockOpname::all();
        
        return view('transactions/stock-opname', compact('stokOp'));
    }

    /*
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
    public function store(StockOpnameService $opnameServ, ItemService $itemServ, StockOpnameRequest $req)
    {
        //

        $opnameItems = $req->validated();

        $transData = Arr::except($opnameItems, ['item_id', 'on_hand']);
        // return $transData;
        $stockOp = StockOpname::findOrFail($opnameServ->makeTransJournal($transData));
        //  $opnameServ->makeTransJournal($transData);

        $itemId = $opnameItems['item_id'];
        $whouseId = $opnameItems['gudang_id'];
        DB::beginTransaction();
        try {
            foreach ($itemId as $index => $id) {
                $onBook = $itemServ->getStocksQtyByWhouse($opnameItems['gudang_id'], $id);
                $itemServ->updateStocks($id, $whouseId, $opnameItems['on_hand'][$index]);

                $stockOp->details()->attach($id, [
                    'jumlah_tercatat' => $onBook,
                    'jumlah_fisik'    => $opnameItems['on_hand'][$index]
                ]);
            }
        } catch (\Exception $e) {
            //throw $th;
            DB::rollBack();
            throw $e;
        }
        DB::commit();



        return $stockOp;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StockOpname  $stockOpname
     * @return \Illuminate\Http\Response
     */
    public function posting(InventoryLedgerService $invLedg, ItemService $itemServ, $id)
    {
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
    public function destroy(ItemService $itemServ, $id)
    {
        //

        $stockOp = StockOpname::findOrFail($id);

        if ($stockOp['status'] == 'posted') {
            // return redirect()->back()->withErrors($validator)->withInput();
        } else {
            DB::beginTransaction();
            try {
                $recordedData =  $stockOp->with('details')->get()->first()->details;
                foreach ($recordedData as $i => $data) {
                    $stock = $itemServ->getStocksQtyByWhouse($stockOp->gudang_id, $data->id);

                    $perubahan = $data->pivot->jumlah_fisik - $data->pivot->jumlah_tercatat;
                    $revertStock = $stock - $perubahan;

                    $itemServ->updateStocks($data->id, $stockOp->gudang_id, $revertStock);
                }
                $stockOp->delete();
                $stockOp->details()->detach();
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
            DB::commit();
        }
    }
}
