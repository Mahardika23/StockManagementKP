<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\ItemCategory;
use App\Http\Requests\ItemCategoryRequest;

class ItemCategoryController extends Controller
{
  
    protected $model;
    public function __construct(ItemCategory $itemctg)
    {
        $this->model = new Repository($itemctg);
    }
    public function index()
    {
        //
      
        $allData = $this->model->all();
        return view('Management-Data/kategori-barang', compact("allData"));
    }
    public function store(ItemCategoryRequest $request)
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
