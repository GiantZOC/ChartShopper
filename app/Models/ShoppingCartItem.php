<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCartItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shopping_cart_id',
        'chart_product_id',
    ];


    public function ShoppingCart(){
        return $this->belongsTo(ShoppingCart::class, 'shopping_cart_id');
    }

    public function ChartProduct(){
        return $this->hasOne(ChartProduct::class, 'chart_product_id');
    }
}
