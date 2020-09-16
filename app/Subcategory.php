<?php

namespace App;

use Illuminate\Database\Eloquent\Model;;

class Subcategory extends Model
{
    protected $fillable = ['category_id', 'subcategory_name', 'subcategory_image'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
