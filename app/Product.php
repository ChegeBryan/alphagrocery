<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'subcategory_id', 'store_id', 'product_parameter_id', 'product_name', 'product_description', 'product_price', 'product_image', 'product_quantity'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

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
        return $this->belongsTo('App\ProductParameter');
    }
}
