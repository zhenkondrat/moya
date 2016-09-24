<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function sale()
    {
        return $this->belongsTo('App\Sale');
    }

    public function reklams()
    {
        return $this->belongsToMany('App\Reklam');
    }

    public function setSaleAttribute($sale)
    {        
    	$saler = \App\Sale::find($sale[0]);
        $this->sales_id=$saler->id;
        $this->sale=$sale;
        $this->save();
    }

    public function getSaleAttribute($sale)
    { 	
        return $this->sale()->get()->toArray();
    }
}
