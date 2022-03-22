<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping_address extends Model
{

	protected $table = 'shipping_address';
    protected $fillable = [
        'city', 'region',  'zipcode',  'address'
    ];
}
