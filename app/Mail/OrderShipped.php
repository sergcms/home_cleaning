<?php

namespace App\Mail;


use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    // order id
    protected $id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('message')
            ->subject('Home cleaning, your order ' . $this->id)
            ->attach('public/storage/orders/order-' . $this->id . '.pdf', 
                ['order' . $this->id . '.pdf',  'mime' => 'application/pdf' ]);
    }
}
