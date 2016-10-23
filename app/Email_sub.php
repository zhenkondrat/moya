<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email_sub extends Model
{
   public static function add($email)
   {
        $sub = new Email_sub;
        $sub->email = $email;
        $sub->save();
   }
}