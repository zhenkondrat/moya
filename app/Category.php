<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = "categories";


    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
