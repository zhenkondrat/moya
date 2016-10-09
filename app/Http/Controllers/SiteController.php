<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use App;


class SiteController extends Controller
{

    public function startPage()
    {
        return view('pages.start')
        			->with('activepage', 0)
        			->with('categories', App\Category::all()->sortBy('position'))
        			->with('reklams', App\Reklam::where('enabled', 1)->limit(10)->get())
        			->with('sales', App\Sale::all());
    }

	public function reklamsPage()
    {
        return view('pages.reklams')
        			->with('activepage', 1)        			
        			->with('categories', App\Category::all())        			
        			->with('reklams', App\Reklam::where('enabled', 1)->limit(20)->get());
    }


    public function salesPage()
    {
        return view('pages.sales')
        			->with('activepage', 2)
        			->with('categories', App\Category::all())
        			->with('sales', App\Sale::all());
    }

    public function locationPage()
    {
        return view('pages.mapTest');
    }

    public function salePage($id)
    {
        return view('pages.sale')
                    ->with('saled', App\Sale::where('id', '=', $id)->first());
    }
}