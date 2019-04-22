<?php

namespace App\Http\Controllers;

use Session;
use Validator;
use App\Models\User;
use App\Models\Order;
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
        $token = Session::get('_token');

        $user = User::find(1);

        $user->newSubscription('main', 'premium')->create($token);



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
