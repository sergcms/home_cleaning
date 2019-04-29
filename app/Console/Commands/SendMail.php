<?php

namespace App\Console\Commands;

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
    protected $signature = 'send:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail to customer with attach pdf order';

    protected $orders;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        // get all orders where paymant is paid
        $this->orders = Order::where('payment', 'paid')->get();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->orders != null) {

            foreach ($this->orders as $key => $order) {
                if (file_exists(public_path('/storage/orders/order-' . $order->id . '.pdf'))) {
                    // add to queue 
                    // SendMailInvoice::dispatch($order);
                    dispatch(new SendMailInvoice($order));

                    $this->line('Sent invoice №' . $order->id . ' on email ' . $order->user->email);
                } else {
                    $this->line('Send was not on email ' . $order->user->email . ', because is not exist pdf file.');
                }
            }
        } else {
            $this->line('No order for send!');
        }
    }
}
