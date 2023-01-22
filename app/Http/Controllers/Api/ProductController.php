<?php
 
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * The product repository implementation.
     *
     * @var ProductRepository
     */
    protected $product;
 
    /**
     * Create a new controller instance.
     *
     * @param  ProductRepository  $productsRepository
     * @return void
     */
    public function __construct(ProductRepositoryInterface $productsRepository)
    {
        $this->product = $productsRepository;
    }

    /**
     * Get the list of available products.
     *
     * @return Collection
     */
    public function getAvailable()
    {
        return $this->product->availableProducts();
    }

    /**
     * Add product.
     *
     * @param \App\Http\Requests\ProductRequest $request
     * @return Object
     */
    public function store(ProductRequest $request)
    {
        return $this->product->store($request->validated());
    }
    
    /**
     * Edit product with the given ID and data.
     *
     * @param Integer $ID
     * @param \App\Http\Requests\ProductRequest $request
     * @return Object
     */
    public function update($ID, ProductRequest $request)
    {
        return $this->product->update($request->validated(), $ID);
    }
}