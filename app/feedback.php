<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
     protected $table = 'feedback';

    protected $fillable = ['userId', 'productId', 'text', 'created_at'];
}
