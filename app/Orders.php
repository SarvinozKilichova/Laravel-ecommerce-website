<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';

    protected $fillable = ['userId', 'orderNumber', 'status', 'grand_total', 'item_count', 'payment_status', 'payment_method', 'paymentId', 'payment_datetime', 'notes', 'created_at'];

    public function user(){
    	return $this->belongsTo(User::class, 'userId');
    }

    public function items(){
    	return $this->hasMany(Order_items::class, 'orderId');
    }

}
