<?php
namespace App\Repositories\Interfaces;

Interface CartRepositoryInterface{
    
    public function allCarts();
    public function createEmpty();
    public function store($ID, $products);
    public function get($ID);
    public function process($ID);
}