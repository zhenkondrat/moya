<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Reklam extends Model
{
    
	public function shops()
   	{
        return $this->belongsToMany('App\Shop');
        // return $this->hasMany('App\Shop');
	}

    public function magazines()
    {
        return $this->hasMany('App\Magazine');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

	public function setShopsAttribute($shops)
    {
        // перепрописываем отношения с таблицей shops
        $this->shops()->detach();
        if ( ! $shops) return;
        if ( ! $this->exists) $this->save();
        $this->shops()->attach($shops);
 
    }

    public function getBegin()
    {
        $dt2 = new Carbon( $this->begin ); 
        return $dt2->format('Y-m-d');
    }

    public function getEnd()
    {
        $dt2 = new Carbon( $this->end ); 
        return $dt2->format('Y-m-d');
    }

    public function getDays()
    {
        $dt = new Carbon( $this->end ); 
        $dt2 = Carbon::today();//new Carbon( $this->begin ); 
        $dt3 = $dt2->diffInDays($dt, false);
        return $dt3;
    }

    public function isActive(){
        $today = Carbon::today();
        if ($today >= $this->begin && $today <= $this->end) 
            return true;
        else
            return false;
    }

    public function isNext(){
        $today = Carbon::today();
        if ($today < $this->begin) 
            return true;
        else
            return false;
    }
 
    public function getShopsAttribute($shops)
    {
        return array_pluck($this->shops()->get()->toArray(), 'id');
        // return $this->shops()->get();
    }

   
}
