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
        $this->sale_id=$saler->id;
        $this->sale=$sale;
        $this->save();
    }

    public function getSaleAttribute($sale)
    { 	
        return $this->sale()->get()->toArray();
    }

    public function getCity()
    {
        $begin_index=0;
        $arr=['м', 'г', 'смт'];
        $adress = $this->adress;

        for($i=0; $i<count($arr); $i++)
        {
           if ( strpos($adress, $arr[$i]) > 0 )
           {
                $adress = substr($adress, strpos($adress, $arr[$i].'.'));
                break;
           }
        }

        $adress = substr($adress, 0, strpos($adress, ' ')-1 );

        return $adress;
    }

    public function getFormatedPhone()
    {
        $phone = $this->phone;
        $count = strlen($phone);
        switch ($count) {
            case 9:
                return $phone;
                break;
            case 10:
                return '+38('.substr($phone,0,3).')'.substr($phone,3,3).'-'.substr($phone,6,2).'-'.substr($phone,8,2);
                break;
            case 11:
                return '+38('.substr($phone,1,3).')'.substr($phone,4,3).'-'.substr($phone,7,2).'-'.substr($phone,9,2);
                break;
            case 11:
                return '+38('.substr($phone,2,3).')'.substr($phone,5,3).'-'.substr($phone,8,2).'-'.substr($phone,10,2);
                break;
            default:
                return $phone;
                break;
        }
    }
}
