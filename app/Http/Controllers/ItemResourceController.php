<?php

namespace App\Http\Controllers;

use App\Items;
use Illuminate\Http\Request;
use App\Services\ItemService;
use App\Http\Requests\CreateItemsRequest;

class ItemResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(ItemService $item)
    {
        $allItem = $item->except(['harga_retail', 'harga_grosir', 'item_image', 'akun_hpp', 'pajak_id', 'supplier_id']);
        // return $allItem;
        return view('Management-Data/barang', compact("allItem"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemService $itemService, CreateItemsRequest $request)
    {
        //
        $input = $request->validated();

        $item = $itemService->create($input);
         
        return redirect()->back()->withSuccess($message);
    }

    /**p
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $itc = $this->modelName::find($id);
        $itc->delete();
        return "Success";
    }
}
