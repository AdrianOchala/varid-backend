<?php
 
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CartRepositoryInterface;
use App\Http\Requests\CartRequest;

class CartController extends Controller
{
    /**
     * The cart repository implementation.
     *
     * @var ProductRepository
     */
    protected $cart;
 
    /**
     * Create a new controller instance.
     *
     * @param  CartRepository  $cartRepository
     * @return void
     */
    public function __construct(CartRepositoryInterface $cartRepository)
    {
        $this->cart = $cartRepository;
    }

    /**
     * Get the list of all carts.
     *
     * @return Collection
     */
    public function getAll()
    {
        return $this->cart->allCarts();
    }
}