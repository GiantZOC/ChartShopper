<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChartProduct;
use Illuminate\Support\Facades\Log;

class ChartProductController extends Controller
{
    // all ChartProduct
    public function get()
    {
        $Charts = ChartProduct::all()->sortBy('id')->toArray();
        return $Charts;
    }
 
    // add ChartProduct
    public function add(Request $request)
    {        
        Log::debug($request);
        $Pattern = new ChartProduct([
            'id' => $request->input('id'),
            'name' => $request->input('name'),
        ]);
        $Pattern->save();
 
        return response()->json('The Pattern successfully added');
    }
 
    // edit ChartProduct
    public function edit($id)
    {
        $Pattern = ChartProduct::find($id);
        return response()->json($Pattern);
    }
 
    // update ChartProduct
    public function update($id, Request $request)
    {
        $Pattern = ChartProduct::find($id);
        $Pattern->update($request->all());
 
        return response()->json('The Pattern successfully updated');
    }
 
    // delete ChartProduct
    public function delete($id)
    {
        $Pattern = ChartProduct::find($id);
        $Pattern->delete();
 
        return response()->json('The Pattern successfully deleted');
    }
}
