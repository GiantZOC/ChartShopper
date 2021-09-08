<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'is_purchased',
        'user_id',
    ];

    public function ShoppingCartItem(){
        return $this->hasMany(ShoppingCartItem::class);
    }
}
