<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Order;
use Session;

class CheckStatusPaymentOrder
{
    /**
     * Handle an incoming request.
     *
     * check status payment,  
     * if paid - show view('paid')
     * if pending - redirect to route('payment')
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::get('info')) {
            $order = Order::find(Session::get('info.order_id'));

            if ($order) {
                if ($order->payment === 'pending') {

                    return redirect()->route('payment');

                } elseif ($order->payment === 'paid') {
                    $message = "Thank you, payment was successful!";

                    return view('paid', ['message' => $message]);
                }
            }
        }

        return $next($request);
    }
}
