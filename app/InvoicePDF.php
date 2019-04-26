<?php

namespace App;

use App\Models\Order;
use App\Models\OrdersExtra;
use \ConsoleTVs\Invoices\Classes\Invoice as PDF;

class InvoicePDF
{
    /**
     * 
     */
    public function generateNameFromKey($key)
    {
        return ucfirst(str_ireplace('_', ' ', $key));
    }

    /**
     * create invoice pdf file 
     */
    public function createPDF(Order $order)
    {
        // $order->personalInfo;

        // generate invoice and save
        $invoice = PDF::make()
            ->addItem('Per cleaning house', $order->per_cleaning);
        
            // add extra service
        foreach ($order->extras->getAttributes() as $key => $value) {
            if (($value == 1) && ($key != 'id') && ($key != 'order_id')) {
                $invoice->addItem($this->generateNameFromKey($key), config('price.extras.' . $key));
            }
        }

        $invoice->number($order->id)
            ->customer([
                'name'      => $order->first_name . ' ' . $order->last_name,
                'phone'     => $order->phone,
                'location'  => $order->address . ', ' . $order->apt,
                'zip'       => $order->user->zip_code,
                'city'      => $order->city,
            ])
            // ->total($order->total_sum)
            // ->notes('')
            ->save('public/order-' . $order->id .  '.pdf');
    }
}
