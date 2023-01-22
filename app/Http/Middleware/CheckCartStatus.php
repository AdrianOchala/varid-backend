<?php

namespace App\Http\Middleware;

use App\Repositories\CartRepository;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckCartStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $status)
    {
        $cartObj = new CartRepository;
        $cart = $cartObj->get($request->ID);
        if ($cart && $cart->cart_status_id == $status) {
            return $next($request);
        } else {
            return (new Response())->setStatusCode(470, 'Cart is in wrong status for this action!');
        }
    }
}
