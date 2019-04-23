<?php

namespace App\Http\Controllers;

use Session;
use Validator;
use Carbon\Carbon;
use Stripe\Stripe;
use App\Models\User;
use Stripe\Customer;
use App\Models\Order;
use Laravel\Cashier\Card;

use Illuminate\Http\Request;
use Laravel\Cashier\Billable;

class PaymentController extends Controller
{
    public function show()
    {
        // get Order model 
        // $order = Order::find(Session::get('info.order_id'));
        $order = Order::find(1);

        // if (!$order) {
        //     return redirect()->route('welcome');
        // }

        return view('form.payment', ['order' => $order]);
    }

    public function charge(Request $request) 
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // get Order model 
        // $order = Order::find(Session::get('info.order_id'));

        $order = Order::find(10);
        // get User model
        $user = $order->user;
        // total sum without dot
        $total = str_replace('.', '', $order->total_sum); 
        
        if (!$user->stripe_id) {
            // create new Customer
            $customer = $this->createCustomer($user);
        }

        if (!$user->asStripeCustomer()->default_source) {
            $message = 'You have not registered card in Stripe, please add card!';

            return view('paid', ['message' => $message]);
        }

        if ($order->personalInfo->cleaning_frequency == 'once') {
            // payment one time
            $payment = $user->charge($total);
            $payment = $payment->paid;
        } else {
            // create new plan
            $plan = $this->createPlan($order, $total);

            // create new subscripe 
            $subscribe = $user->newSubscription($plan->nickname, $plan->id)->create();
            $payment = $subscribe->exists;
        }
        
        if ($payment) {
            Order::where('id', Session::get('info.order_id'))
                ->update([
                    'payment'      => 'paid',
                    'date_payment' => Carbon::now(),
            ]);
        } else {
            Order::where('id', Session::get('info.order_id'))->update([
                'payment'   => 'failed',
            ]);

            $message = "Sorry, payment did not go well, try again later!";

            return view('paid', ['message' => $message]);
        }

        // $cards = $user->cards([
        //     'number'      => 4242424242424242,
        //     'exp_month'   => 8,
        //     'exp_year'    => 2022,
        //     'cvc'         => 123,
        //     'name'        => $user->first_name . ' ' . $user->last_name,
        // ])->create($stripeCustomerId, env('STRIPE_KEY'));

        $message = "Thank you, payment was successful!";

        return view('paid', ['message' => $message]);
    }

    public function createCustomer(User $user)
    {
        $customer = $user->createAsStripeCustomer([
            "name"        => $user->first_name . ' ' . $user->last_name,
            "description" => "home cleaning",
            "phone"       => $user->phone,
            "address"     => [
                'line1'       => $user->address . ', ' . $user->apt,
                'city'        => $user->city,
                'postal_code' => $user->zip_code,
            ],
        ]);

        return $customer;
    }

    public function createPlan(Order $order, $total)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $interval = $order->personalInfo->cleaning_frequency;
        
        switch ($interval) {
            case 'weekly':
                $interval = 'week';
                break;
            case 'biweekly':
                $interval = 'week';
                break;
            case 'monthly':
                $interval = 'month';
                break;
        }

        $plan = \Stripe\Plan::create([
            'currency' => 'usd',
            'interval' => $interval,
            "product" => [
                "name" => $order->personalInfo->cleaning_frequency . '-' . $order->id 
            ],
            'nickname' => $order->personalInfo->cleaning_frequency,
            'amount'   => $total,
            // 'interval_count' => $order->personalInfo->cleaning_frequency == 'biweekly' ? 2 : 1,
        ]);

        // if (!$plan) {
        //     return $plan;
        // }

        return $plan;

    }
}
