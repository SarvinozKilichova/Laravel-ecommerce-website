<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
     protected $table = 'news';

    protected $fillable = ['title', 'slug', 'img', 'text', 'created_at', 'author', 'updated_at'];

}
