<?php
 
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CartRepositoryInterface;
use App\Http\Requests\CartRequest;
use Illuminate\Http\Request;

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
    
    /**
     * Create empty cart with status "new".
     *
     * @return Collection
     */
    public function create()
    {
        return $this->cart->createEmpty();
    }
    
    /**
     * Add products to cart.
     *
     * @return Collection
     */
    public function store($ID, Request $request)
    {   
        return $this->cart->store($ID, json_decode($request->products));
    }

    public function process($ID)
    {
        return $this->cart->process($ID);
    }
}