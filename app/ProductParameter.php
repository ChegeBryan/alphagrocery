<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductParameter extends Model
{
    protected $table = 'product_parameters';
    protected $fillable = ['parameter'];
}
