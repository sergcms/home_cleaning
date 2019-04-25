<?php

namespace App;

use Session;
use Carbon\Carbon;
use App\Models\User;
use Stripe\Customer;
use Stripe\Stripe;
use App\Models\Order;
use Laravel\Cashier\Card;
use Illuminate\Http\Request;
use Laravel\Cashier\Billable;

class Payment
{

    /**
     * prepare amount for stripe
     */
    public function prepareAmount($total)
    {
        return (int)round($total * 100, 0);
    }

    /**
     * create new customer
     */
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

    /**
     * create new plan
     */
    public function createPlan(Order $order)
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
                "name" => $order->first_name . ' ' . $order->last_name
            ],
            'nickname' => $order->personalInfo->cleaning_frequency,
            'amount'   => $this->prepareAmount($order->total_sum),
            'interval_count' => $order->personalInfo->cleaning_frequency == 'biweekly' ? 2 : 1,
        ]);

        if (!$plan) {
            return false;
        }

        return $plan;
    }

    /**
     * check payment
     */
    public function checkPayment(Order $order, $payment = false)
    {
        if ($payment) {
            Order::find($order->id)
                ->update([
                    'payment'      => 'paid',
                    'date_payment' => Carbon::now(),
            ]);

            return true;
        } else {
            Order::find($order->id)->update([
                'payment'   => 'failed',
            ]);
                
            return false;
        }
    }
}
