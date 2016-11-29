<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{

	public static function add($id)
   {
        $comm = new Favorite;
        $comm->reklam_id = $id;
        $comm->user_id = session('user_id');
        $comm->save();
   }

   public static function del($id)
   {
        Favorite::where('reklam_id', '=', $id)->delete();
   }

    public static function isFavorite($id)
    {
        if (Favorite::whereRaw('user_id = ? and reklam_id = ?', [session('user_id'), $id])->count() >0 )
            return true;
        else
            return false;

    }
 
    public function reklam()
    {
        return $this->belongsTo('App\Reklam');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}