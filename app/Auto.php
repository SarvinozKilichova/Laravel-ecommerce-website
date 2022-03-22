<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
      protected $table = 'autos';

    protected $fillable = ['description', 'delivery', 'image1, image2', 'image3', 'color1', 'color2', 'color3', 'color4',];


    public function user(){
    	return $this->belongsTo('App\Product');
    }  
}
