<?php

namespace App\Http\Controllers;

use Session;
use App\Payment;
use Stripe\Stripe;
use App\InvoicePDF;
use App\Models\User;
use Stripe\Customer;
use App\Models\Order;
use Laravel\Cashier\Card;
use Illuminate\Http\Request;
use Laravel\Cashier\Billable;

class PaymentController extends Controller
{
    /**
     * show form payment
     */
    public function show()
    {
        // get Order model 
        $order = Order::find(Session::get('info.order_id'));

        if (!$order) {
            return redirect()->route('welcome');
        }

        return view('form.payment', ['order' => $order]);
    }

    /**
     * payment
     */
    public function charge(Request $request) 
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // get Order model 
        $order = Order::find(Session::get('info.order_id'));
        // get User model
        $user = $order->user;

        $payment = new Payment();

        $total = $payment->prepareAmount($order->total_sum);

        if (!$user->stripe_id) {
            // create new Customer
            $customer = $payment->createCustomer($user);
        }

        // create or update Card
        $user->updateCard($request->stripeToken);

        if ($order->personalInfo->cleaning_frequency == 'once') {
            // payment one time
            $pay = $user->charge($total);
            $pay = $pay->paid;
        } else {
            // create new plan
            $plan = $payment->createPlan($order, $total);
            // check plan
            if (!$plan) {
                $message = "Sorry, stripe plan did not create!";

                return view('paid', ['message' => $message]); 
            }

            // create new subscripe 
            $subscribe = $user->newSubscription($plan->nickname, $plan->id)->create();
            $pay = $subscribe->exists;
        }

        // check payment
        if(!$payment->checkPayment($order, $pay)) {
            $message = "Sorry, payment did not go well, try again later!";
            
            return view('paid', ['message' => $message]); 
        };

         // work with pdf
         $pdf = new InvoicePDF();
         // create pdf invoice 
         $pdf->createPDF($order);

        // session clear
        Session::flush();
  
        $message = "Thank you, payment was successful!";

        return view('paid', ['message' => $message]);
    }
}
