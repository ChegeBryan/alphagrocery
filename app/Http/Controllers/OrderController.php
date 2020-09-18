<?php

namespace App\Http\Controllers;

use App\Order;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function saveOrder()
    {
        $items = \Cart::getContent();
        foreach ($items as $item) {
            $item = new Order([
                'customer_id' => Auth::user()->id,
                'shipping_id' => Session::get('deliveryinfo'),
                'product_id' => $item->id,
                'store_id' => $item->attributes->store,
                'store_name' => $item->attributes->store_name,
                'product_name' => $item->name,
                'product_image' => $item->attributes->image,
                'product_quantity' => $item->quantity,
                'order_subtotal' => $item->getPriceSum(),
            ]);
            $item->save();
        }
    }
}
