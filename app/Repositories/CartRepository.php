<?php 

namespace App\Repositories;

use App\Constants\CartStatus;
use App\Events\ChangeCartStatusToCompleted;
use App\Models\Cart;
use App\Models\Product;
use App\Repositories\Interfaces\CartRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CartRepository implements CartRepositoryInterface 
{
    public function allCarts()
    {
        return Cart::with(['products', 'status'])->get();
    }

    public function createEmpty()
    {
        return Cart::create();
    }

    public function get($ID)
    {
        return Cart::find($ID);
    }

    public function store($ID, $products)
    {
        $cart = $this->get($ID);
        DB::beginTransaction();
        try {
            foreach ($products as $product) {
                $productInstance = Product::find($product->id);
                $productInstance->decrement('stock', $product->amount);
                $cart->incrementEach([
                    'total_amount' => $product->amount,
                    'total_price'  => $product->price
                ]);
                $cart->products()->attach($productInstance->id, ['amount' => $product->amount, 'price' => $product->price]);
            }
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => 'Error in adding products to cart! ' . $th->getMessage()]);
        }
    }

    public function process($ID)
    {
        $validCart = Cart::has('products')
                        ->where('cart_status_id', CartStatus::NEW)
                        ->where('id', $ID)
                        ->exists();
                        
        if ($validCart) {
            $cart = Cart::find($ID);
            ChangeCartStatusToCompleted::dispatch($cart);
            return $cart->update(['cart_status_id' => CartStatus::PROCESSED]);
        } else {
            return response()->json(['error' => 'Cannot process chosen cart!']);
        }
    }

    public function destroy($ID)
    {
        DB::beginTransaction();
        try {
            $cart = Cart::find($ID);
            foreach ($cart->products as $product) {
                $product->increment('stockeada', $product->pivot->amount);
            }
            DB::commit();
            return $cart->delete();
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => 'Error in deleting cart! ' . $th->getMessage()]);

        }
    }
}