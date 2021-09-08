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
 
    //edit the shopping cart
    public function update($id, Request $request)
    {
        $shoppingCart = ShoppingCart::find($id);
        $shoppingCart->update($request->all());
        return response()->json($shoppingCart);
    }

}
