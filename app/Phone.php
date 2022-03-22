<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'phones';

    protected $fillable = ['description', 'delivery', 'img1, img2', 'img3', 'color1', 'color2', 'color3', 'color4'];


    public function user(){
    	return $this->belongsTo('App\Product');
    }  
}
