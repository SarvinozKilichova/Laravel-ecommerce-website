<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    protected $table = 'order_details';

    protected $fillable = [
    	'orderId', 'userId', 'productId', 'quantity', 'price'
    ];

    public function user(){
    	return $this->belongsTo(Product::class, 'productId');
    }
}
