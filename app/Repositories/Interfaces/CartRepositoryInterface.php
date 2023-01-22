<?php
namespace App\Repositories\Interfaces;

Interface CartRepositoryInterface{
    
    public function allCarts();
    public function createEmpty();
}