<?php

namespace App\Http\Middleware;

use Closure;

class CheckStripeToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->stripeToken) {
            $message = "Sorry, no token!";

            return view('paid', ['message' => $message]);
        }

        return $next($request);
    }
}
