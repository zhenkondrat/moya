<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respond extends Model
{

	public static function add($arr)
   {
        $comm = new Respond;
        $comm->text = $arr[0];
        $comm->new_id = $arr[1];//not news, this is a sale id
        $comm->reiting = $arr[2];
        $comm->user_id = session('user_id');
        $comm->save();
   }

   public static function avgReiting($sale){
       return Respond::where('new_id', $sale)->avg('reiting');
   }

    public function news()
    {
        return $this->belongsTo('App\News');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}