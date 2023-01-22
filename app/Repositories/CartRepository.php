<?php 

namespace App\Repositories;

use App\Models\Cart;
use App\Repositories\Interfaces\CartRepositoryInterface;

class CartRepository implements CartRepositoryInterface 
{
    public function allCarts()
    {
        return Cart::with('products')->get();
    }
}