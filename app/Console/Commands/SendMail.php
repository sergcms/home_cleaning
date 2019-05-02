<?php

namespace App\Console\Commands;

use Validator;
use App\Models\Order;
use App\Mail\OrderShipped;
use App\Jobs\SendMailInvoice;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:mail {date?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail to customer with attach pdf order';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

    }
        
    /**
     * get all orders where paymant is paid
     */
    public function getOrders($date = '') 
    {
        if ($date == '') {
            $orders = Order::where('payment', 'paid')->get();
        } else {
            $orders = Order::where('payment', 'paid')
                    ->where('date_payment', $date)
                    ->get();
        }

        return $orders;
    } 

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info($this->description);
        $date = $this->argument('date');

        if ($date != '') {
            $validator = Validator::make(['date'  => $date], ['date' => 'date']);

            if ($validator->fails()) {
                $messages = $validator->messages();

                return $this->line($messages);
            }
            $orders = $this->getOrders($date);
        } else {
            $orders = $this->getOrders();
        }

        if ($orders->isNotEmpty()) {
            foreach ($orders as $key => $order) {
                $this->line('ok');

                if (file_exists(public_path('/storage/orders/order-' . $order->id . '.pdf'))) {
                    // add to queue 
                    SendMailInvoice::dispatch($order);
                    // dispatch(new SendMailInvoice($order));

                    $this->line('Sent invoice №' . $order->id . ' on email ' . $order->user->email);
                } else {
                    $this->line('Send was not on email ' . $order->user->email . ', because is not exist pdf file.');
                }
            }
        } else {
            $this->line('No order for send!');
        }

        return true;
    }
}
