<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permit extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}
