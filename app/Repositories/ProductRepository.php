<?php 

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface 
{
    public function availableProducts()
    {
        return Product::where('stock', '>', 0)->get();
    }

    public function store($data)
    {
        return Product::create($data);
    }

    public function update($data, $ID)
    {
        return Product::where('id', $ID)->update($data);
    }
}