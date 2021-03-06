<?php

namespace App\Http\Controllers;
use App\ItemCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;
class KategoriBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $modelName = "App\ItemCategory";

    public function index()
    {
        //
      
        $itemCtg = new $this->modelName;
        $allItemCtgs = $itemCtg->all(); 
        return view('Management-Data/kategori-barang',compact("allItemCtgs"));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create_item_ctg');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->except("kode_kategori");
        $input["akun"] = 001;
        // dd($input);
        $itemCat = $this->modelName::create($input);
        return redirect()->back();
    }

    /**
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
        //
        $input = $request->except("kode_kategori");
        $input["akun"] = 001;
        // dd($input);
        $itemCat = $this->modelName::find($id);
        $itemCat->update($input);
        return redirect()->back();

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
