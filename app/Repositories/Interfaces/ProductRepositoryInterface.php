<?php
namespace App\Repositories\Interfaces;

Interface ProductRepositoryInterface{
    
    public function availableProducts();
    public function store($data);
    public function update($data, $ID);
}