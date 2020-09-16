<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name', 'category_description', 'category_pic'];

    public function subcategories()
    {
        return $this->hasMany('App\Subcategory');
    }
}
