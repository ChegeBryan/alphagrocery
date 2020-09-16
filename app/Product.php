<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'subcategory_id', 'store_id','product_parameter_id','product_name','product_description', 'product_price', 'product_image', 'product_quantity']
}
