<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['subcategory_id', 'store_id', 'product_parameter_id', 'product_name', 'product_description', 'product_price', 'product_image', 'product_quantity'];

    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }

    public function store()
    {
        return $this->belongsTo('App\Store');
    }
    public function parameter()
    {
        return $this->belongsTo('App\ProductParameter', 'product_parameter_id');
    }
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
