<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Taxes;
use App\Http\Requests\CreateTaxRequest;
class TaxResourceController extends Controller
{
    //

    protected $model;
    public function __construct(Taxes $tax){
        $this->model = new Repository($tax);
    }
    public function index()
    {
        //
      
        $allData = $this->model->all();
        return $allData;    
        // return view('Management-Data/pajak',compact("allData"));



    }
    public function store(CreateTaxRequest $request)
    {
        $input = $request->input();
        $data= $this->model->create($input);
        return $data;
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
        // return $this->model->update($input,$id);
        
        return redirect()->back();

    }

    public function destroy($id)
    {
        //
        $this->model->delete($id);
        return "Success";
    }

}
