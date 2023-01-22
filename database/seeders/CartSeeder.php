<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cart::factory()
            ->count(5)
            ->hasAttached(
                Product::factory()->count(2),
                [
                    'price'  => 100,
                    'amount' => 1
                ]
            )
            ->create();
    }
}
