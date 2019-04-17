<?php

namespace App\Http\Middleware;

use Closure;
use App\Order;
use Session;

class HadTotalSumInOrder
{
    /**
     * Handle an incoming request.
     *
     * check whether total amount was generated,  
     * if yes, redirect to route('extras')
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::get('personal_info.id')) {
            $order = Order::find(Session::get('personal_info.id'));

            if ($order->total_sum > 0) {
                return redirect()->route('extras');
            }
        }

        return $next($request);
    }
}
