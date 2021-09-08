<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChartProduct;
use Illuminate\Support\Facades\Log;
use App\Models\ShoppingCart;
use Symfony\Component\ErrorHandler\Debug;

class AvailableProductController extends Controller
{


    public function unsetValue(array $array, $value, $strict = TRUE)
    {
        
        return $array;
    }

    // get all available charts for purchase
    public function get()
    {
        $userid = auth()->id();
        $chartProducts = ChartProduct::all(); //get all charts
        $chartProducts = $chartProducts->toArray(); //convert charts to array
        //get all of the user's shopping carts with lazy loading for shopping cart item and chart product
        $purchasedShoppingCarts = ShoppingCart::with('ShoppingCartItem.ChartProduct')->where('user_id', $userid)->get(); 
    
        //filter out all items that are already in the cart or purchased
        foreach($purchasedShoppingCarts as $ShoppingCart){
            foreach($ShoppingCart->ShoppingCartItem as $ShoppingCartItem){
                if(($key = array_search($ShoppingCartItem->ChartProduct->toArray(), $chartProducts, false)) !== FALSE) {
                    unset($chartProducts[$key]);
                }
            }
        }

        return $chartProducts;
    }

}