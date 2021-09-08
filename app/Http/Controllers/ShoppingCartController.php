<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingCart;

class ShoppingCartController extends Controller
{
    //get current shopping cart for user
    public function get()
    {
        $userid = auth()->id();
        //get the current shopping cart
        $shoppingCart = ShoppingCart::with('ShoppingCartItem.ChartProduct')->where('user_id', $userid)->where('is_purchased', false)->get();
        
        
        return response()->json($shoppingCart);
    }
 
    // add PurchasedProduct
    // public function add()
    // {        
    //     $user = $this->guard()->user();
    //     //Log::debug($request);
    //     $Pattern = new ShoppingCart([
    //         'user_id' => $request->input('id'),
    //         'name' => $request->input('name'),
    //     ]);
    //     $Pattern->save();
 
    //     return response()->json('The PurchasedProduct successfully added');
    // }
 
    //edit the shopping cart
    public function update($id, Request $request)
    {
        $shoppingCart = ShoppingCart::find($id);
        $shoppingCart->update($request->all());
        return response()->json($shoppingCart);
    }
 
    // // update PurchasedProduct
    // public function update($id, Request $request)
    // {
    //     $Pattern = PurchasedProduct::find($id);
    //     $Pattern->update($request->all());
 
    //     return response()->json('The PurchasedProduct successfully updated');
    // }
 
    // // delete PurchasedProduct
    // public function delete($id)
    // {
    //     $Pattern = PurchasedProduct::find($id);
    //     $Pattern->delete();
 
    //     return response()->json('The PurchasedProduct successfully deleted');
    // }
}
