<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Redirect;
use App;

class MapController extends Controller
{
	public function locationPage()
    {
    	$collection = app\Shop::all();
        return view('pages.map')
        ->with('json', $collection);
    }

    public function mylocationPage()
    {
    	$collection = app\Shop::all();
        return view('pages.map')
        ->with('json', $collection)
        ->with('locate', true);
    }

    public function locationShop($shop)
    {
        $collection = app\Shop::where('id',$shop)->get();
        return view('pages.map')
        ->with('json', $collection);
    }

    public function locationSale($sale)
    {
         $collection = App\Sale::find($sale)->shops()->get();
        return view('pages.map')
        ->with('json', $collection);
    }

    public function locationCity($city)
    {
        $collection = App\Shop::where('adress', 'like', '%'.$city.'%')->get();
        return view('pages.map')
        ->with('json', $collection);
    }
}