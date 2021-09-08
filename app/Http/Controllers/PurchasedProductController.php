<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChartProduct;
use Illuminate\Support\Facades\Log;
use App\Models\ShoppingCart;

class PurchasedProductController extends Controller
{
    // get all purchased products for the current user
    public function get()
    {
        $userid = auth()->id();
        //get all the purches shopping carts with shoppingcartitem and chartproduct lazy loaded
        $purchasedShoppingCarts = ShoppingCart::with('ShoppingCartItem.ChartProduct')->where('user_id', $userid)->where('is_purchased', true)->get();
        $purchasedProduct = [];
        //build an array of the products
        foreach($purchasedShoppingCarts as $ShoppingCart){
            foreach($ShoppingCart->ShoppingCartItem as $ShoppingCartItem){
                array_push($purchasedProduct, $ShoppingCartItem->ChartProduct);
            }
        }
        return $purchasedProduct;
    }
}