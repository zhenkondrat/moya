<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	public static function add($arr)
   {
        $comm = new Comment;
        $comm->text = $arr[0];
        $comm->new_id = $arr[1];
        $comm->user_id = session('user_id');
        $comm->save();
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
