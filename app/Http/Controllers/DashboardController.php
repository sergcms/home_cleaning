<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\JsonableInterface;

class DashboardController extends Controller
{
    /**
     * show view dashboard
     */
    public function show()
    {
        return view('dashboard');
    }

    public function getOrders(Request $request)
    {        
        if ($request->isMethod('post') || isset($request->page)) {

            if ($request->orders_per_page === 'all') {
                $orders = $request->status === 'all' 
                    ? Order::orderBy('id', 'desc')->paginate(0)
                    : Order::orderBy('id', 'desc')->where('payment', $request->status)->paginate(0);
            } else {
                $orders = $request->status === 'all' 
                    ? Order::orderBy('id', 'desc')->paginate($request->orders_per_page) 
                    : Order::where('payment', $request->status)
                        ->orderBy('id', 'desc')
                        ->paginate($request->orders_per_page);
            }

            return $orders;
        }

        if (!isset($request->page)) {
            $orders = Order::orderBy('id', 'desc')->paginate(10);
        }

        return $orders; 
    }
}
