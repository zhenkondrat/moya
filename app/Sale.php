<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\Interfaces\ModelWithImageFieldsInterface;
use SleepingOwl\Models\Traits\ModelWithImageOrFileFieldsTrait;

class Sale extends Model
{
    
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
    ];

    public function getImageFields()
    {
        return [
            'image' => 'monuments/',
            'photo' => '',
            'other' => ['other_images/', function($directory, $originalName, $extension)
            {
                return $originalName;
            }]
        ];
    }

    public function shops()
    {
        return $this->hasMany('App\Shop');
    }

    public function news()
    {
        return $this->hasMany('App\News');
    }

}
