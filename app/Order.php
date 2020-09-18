<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'shipping_id',
        'product_id',
        'store_id',
        'store_name',
        'product_name',
        'product_image',
        'product_quantity',
        'order_status',
        'order_subtotal',
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function store()
    {
        return $this->belongsTo('App\Store');
    }
    public function shipping()
    {
        return $this->belongsTo('App\Shipping');
    }
    public function customer()
    {
        return $this->belongsTo('App\User');
    }
}
