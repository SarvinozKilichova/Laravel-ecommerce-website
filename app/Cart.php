<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';

    protected $fillable = [
    					'userId', 'productId', 'quantity', 'created_at', 'updated_at', 'deleted_at'
    ]; 
}
