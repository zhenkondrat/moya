<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    public function reklam()
    {
        return $this->belongsTo('App\Reklam');
    }
}
