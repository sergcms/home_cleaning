<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Session;
use Validator;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public $rules_payment = [
        'card'  => ['required', 'string'],
        'exp_month' => ['required', ],
        'exp_year'  => ['required', ],
        'cvc'     => ['required', 'number', 'digit:3'],
    ];
    
    public function validator($data, $rules)
    {
        return Validator::make($data, $rules)->validate();
    }   
    
    public function show()
    {
        $order = Order::find(Session::get('info.order_id'));

        if (!$order) {
            return redirect()->route('welcome');
        }

        return view('form.payment', ['order' => $order]);
    }

    public function save(Request $request)
    {
        $order = Order::find(Session::get('info.order_id'));
        
        
    }
}
