<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\ItemPurchaseTransaction;
use App\Http\Requests\CreateItemCategoryRequest;

class ItemPurchaseTransactionController extends Controller
{
  
    protected $model;
    public function __construct(ItemCategory $itemPurchTrans){
        $this->model = new Repository($itemPurchTrans);
    }
    public function index()
    {
        //
      
        $allData = $this->model->all();
        return $allData;
        return view('item-purchases',compact("allData"));



    }
    public function store(CreateItemCategory $request)
    {
        $input = $request->validated();
        $data= $this->model->create($input);

        return redirect()->back();
    }

    public function show($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
        $input = $request->only($this->model->getModel()->fillable);
       
        return redirect()->back();

    }

    public function destroy($id)
    {
        //
        $this->model->delete($id);
        return "Success";
    }
}
