<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = ['name', 'phone_number', 'address'];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
