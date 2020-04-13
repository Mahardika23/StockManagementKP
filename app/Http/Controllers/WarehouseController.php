<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Warehouse;
use App\Http\Requests\CreateItemCategoryRequest;

class WarehouseController extends Controller
{
  
    protected $model;
    public function __construct(Warehouse $wh){
        $this->model = new Repository($wh);
    }
    public function index()
    {
        //
      
        $allData = $this->model->all();
        return view('Management-Data/gudang',compact("allData"));



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
