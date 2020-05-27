<?php

namespace App\Http\Controllers;

use App\Repositories\Repository;
use App\CoaTypes;
use Illuminate\Http\Request;

class COATypeController extends Controller
{
    //
    protected $model;
    public function __construct(CoaTypes $coaT)
    {
        $this->model = new Repository($coaT);
    }
    public function index()
    {
        //
      
        $allData = $this->model->with('chart')->get();
        return $allData;
        return view('Management-Data/coa-type', compact("allData"));
    }
    public function store(CreateTaxRequest $request)
    {
        $input = $request->input();
        $data= $this->model->create($input);
        return $data;
        return redirect()->back();
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
