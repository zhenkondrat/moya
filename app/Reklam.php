<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reklam extends Model
{
    
	public function shops()
   	{
        return $this->belongsToMany('App\Shop');
	}

	public function setShopsAttribute($shops)
    {
        // перепрописываем отношения с таблицей shops
        $this->shops()->detach();
        if ( ! $shops) return;
        if ( ! $this->exists) $this->save();
        $this->shops()->attach($shops);
 
    }
 
    public function getShopsAttribute($shops)
    {
        return array_pluck($this->shops()->get()->toArray(), 'id');
    }

}
