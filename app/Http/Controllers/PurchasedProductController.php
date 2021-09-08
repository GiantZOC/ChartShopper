<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChartProduct;
use Illuminate\Support\Facades\Log;
use App\Models\ShoppingCart;

class PurchasedProductController extends Controller
{
    // all ChartProduct
    public function get()
    {
        $userid = auth()->id();
        $purchasedShoppingCarts = ShoppingCart::with('ShoppingCartItem.ChartProduct')->where('user_id', $userid)->where('is_purchased', true)->get();
        $purchasedProduct = [];
        foreach($purchasedShoppingCarts as $ShoppingCart){
            foreach($ShoppingCart->ShoppingCartItem as $ShoppingCartItem){
                array_push($purchasedProduct, $ShoppingCartItem->ChartProduct);
            }
        }
        Log::debug($purchasedProduct);
        return $purchasedProduct;
    }
}