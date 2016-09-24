<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function reklam()
    {
        return $this->belongsTo('App\Reklam');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
