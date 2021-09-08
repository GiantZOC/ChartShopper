<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingCartItem;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Models\ChartProduct;
use App\Models\ShoppingCart;
use Illuminate\Database\Eloquent\Builder;

class ShoppingCartItemController extends Controller
{
    // all PurchasedProduct
    // public function index()
    // {
    //     $Patterns = PurchasedProduct::all()->sortByDesc('id')->toArray();
    //     return array_reverse($Patterns);
    // }

    // add ShoppingCartItem
    public function get()
    {        
        //$user = $this->guard()->user();
        $userid = auth()->id();
        Log::debug($userid);
        $shoppingCartItems = ShoppingCartItem::find($userid);
        

        return $shoppingCartItems; 
 
        //return response()->json('The ShoppingCartItem successfully added');
    }
 
    // add ShoppingCartItem to shopping cart
    public function add($id)
    {        
        $userid = auth()->id();

        //get the current shopping cart
        $shoppingCart = ShoppingCart::where('user_id', $userid)->where('is_purchased', false)->first();
        
        //create the cart if it doesn't exist
        if(!$shoppingCart){
            $shoppingCart = ShoppingCart::create([
                'user_id' => $userid,
                'is_purchased' => false
            ]);
        }

        //see if the user has already purchased or added item to cart
        //$alreadyExists = ShoppingCartItem::where('chart_product', $id)->where('')

        $count = ShoppingCart::where('user_id', $userid)->whereHas('ShoppingCartItem', function (Builder $query) use ($id) {
            $query->where('chart_product_id', $id);
        }, '>=', 1)->count();


        Log::debug("Exists" . $count);
        if($count == 0){
            //add the item to the cart
            $shoppingcartitem = ShoppingCartItem::create([
                'chart_product_id' => $id,
                'shopping_cart_id' => $shoppingCart->id
            ]);

            return response()->json('The ShoppingCartItem successfully added');    
        }else{
            return response()->json('The ShoppingCartItem already exists', 400);
        }

 
        
    }
 
    // edit ShoppingCartItem
    public function edit($id)
    {
        $Pattern = ShoppingCartItem::find($id);
        return response()->json($Pattern);
    }
 
    // update ShoppingCartItem
    public function update($id, Request $request)
    {
        $Pattern = ShoppingCartItem::find($id);
        $Pattern->update($request->all());
 
        return response()->json('The ShoppingCartItem successfully updated');
    }
 
    // delete ShoppingCartItem
    public function delete($id)
    {
        $Pattern = ShoppingCartItem::find($id);
        $Pattern->delete();
 
        return response()->json('The ShoppingCartItem successfully deleted');
    }
}
