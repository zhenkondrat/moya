<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Redirect;
use App;
use App\Email_sub;
use Carbon\Carbon;

class SiteController extends Controller
{

    public function startPage()
    {
        return view('pages.start')
        			->with('activepage', 0)
        			->with('categories', App\Category::all()->sortBy('position'))
        			->with('reklams', App\Reklam::where('enabled', 1)->limit(10)->get())
                    ->with('news', App\News::all()->sortByDesc('id'))
        			->with('sales', App\Sale::all());
    }

    public function myreklamsPage()
    {
        //session(['user_id' => $user->id]);
        return view('pages.myreklams');
    }

	public function reklamsPage($param)
    {   
        switch ($param) {
            case 'all':
                $data = App\Reklam::where('enabled', 1)->limit(20)->get();
                $active =1;
                break;
            case 'actual':
                $data = App\Reklam::where('begin', '<=', Carbon::today()->toDateString())->limit(20)->get();
                $active =2;
                break;
            case 'soon':
                $data = App\Reklam::where('begin', '>', Carbon::today()->toDateString())->limit(20)->get();
                $active =3;
                break;
            default:
                $active =1;
                if (is_numeric($param))
                    $data = App\Reklam::all();// filtr po categoria
                break;
        }

        return view('pages.reklams')
        			->with('activepage', 1)        	
                    ->with('activedata', $active)  		
        			->with('categories', App\Category::all())      
                    ->with('sales', App\Sale::all()->random(5)) 			
        			->with('reklams', $data);
    }

    public function reklamPage($id)
    {
        $reklam = App\Reklam::where('id', '=', $id)->first();
        return view('pages.reklam')
                    ->with('activepage', 1)                                   
                    ->with('categories', App\Category::all())                   
                    ->with('reklam', $reklam);
    }


    public function salesPage($param)
    {
        switch ($param) {
            case 'all':
                $data = App\Sale::all();                
                break;
            case 'sort':
                $data = App\Sale::all()->sortBy('name');               
                break;            
            default:
                if (is_numeric($param))
                    $data = App\Reklam::all();// filtr po categoria
                break;
        }

        return view('pages.sales')
        			->with('activepage', 2)
        			->with('categories', App\Category::all())
        			->with('sales', $data);
    }


    public function getjson()
    {
        return app\Shop::all()->toJson();
    }
    
    public function salePage($id)
    {
        $news = App\News::where('sale_id', $id)->get();
        $collection = App\Respond::orderBy('created_at', 'desc');
        $collection = $collection->where('new_id',$id);
        return view('pages.sale')
                    ->with('news', collect($news))
                    ->with('responds',  $collection->paginate(8))//----
                    ->with('categories', App\Category::all())
                    ->with('saled', App\Sale::where('id', '=', $id)->first());
    }

    public function add_email(Request $request)
    {
        if (Input::get('checkbox')!=null)
        {
            $email = Input::get('email');
            Email_sub::add($email);
            return Redirect::back()->with('success', 'Вы успешно подписались, на расписку');
        }
        else
            return Redirect::back()->withErrors(['Возможно Вы не согласились с условиями. Прочтите, и повторите подписку снова', '']);
    }

    public function shopsPage(Request $request)
    {
        $collection = App\Shop::all();

        if (Input::get('find_sale')!=null)
        {
            $sale = Input::get('find_sale');
            $sale_id =  App\Sale::where('name', $sale)->first()['id'];
            $collection = App\Sale::find($sale_id);

            if ($collection == null) {
                $collection = [];//abort(404);// return view('errors.404');
            } else {
                $collection = $collection->shops;
            }
        }

        if (Input::get('find_city')!=null)
        {
            $city = Input::get('find_city');
            $collection = App\Shop::where('adress', 'like', '%'.$city.'%')->get();
 
        }
        if (Input::get('find_sale')!=null && Input::get('find_city')!=null)
        {
            $city = Input::get('find_city');    
            $sale = Input::get('find_sale');
            $sale_id =  App\Sale::where('name', $sale)->first()['id'];
             $collection = App\Sale::find($sale_id)->shops()->where('adress', 'like', '%'.$city.'%')->get();
        
        }
        return view('pages.shops')
                    ->with('shop_list', $collection);
    }

    public function shopPage($city)
    {
        return view('pages.shops')
                    ->with('shop_list', App\Shop::where('adress', 'like', '%'.$city.'%')->get());
    }

    public function newsPage()
    {
        $collection = App\News::orderBy('created_at', 'desc');

        return view('pages.news')
                    ->with('news', $collection->paginate(2) );
    }

    public function onenewsPage($id)
    {
        $collection = App\News::where('id', '=', $id)->first();

        return view('pages.onenews')
                    ->with('onenews', $collection )
                    ->with('comments', App\Comment::where('new_id', '=', $collection->id)->get() );
    }

    public function add_comment(Request $request)
    {       
            $text = Input::get('text');
            $news_id = Input::get('news_id');

            App\Comment::add([$text, $news_id]);
            return Redirect::back();
    }

    public function super_search(Request $request)
    {
        $data = Input::get('search');        
        //продукции, торговых сетей, рекламок
        $res = App\Product::where('name','like', '%'.$data.'%')->get();
        if (count($res)!=0)
            dd($res);

        $res = App\Sale::where('name','like', '%'.$data.'%')->get();
        if (count($res)!=0){            
            return view('pages.sales')
                    ->with('activepage', 2)
                    ->with('categories', App\Category::all())
                    ->with('sales', $res);
        }
        
        $res = App\Sale::where('full_name','like', '%'.$data.'%')->get();
        if (count($res)!=0){            
            return view('pages.sales')
                    ->with('activepage', 2)
                    ->with('categories', App\Category::all())
                    ->with('sales', $res);
        }

        $res = App\Reklam::where('name','like', '%'.$data.'%')->get();
        if (count($res)!=0){            
            return view('pages.reklams')
                    ->with('activepage', 1)                 
                    ->with('categories', App\Category::all())      
                    ->with('sales', App\Sale::all()->random(5))             
                    ->with('reklams', $res);
        }

        return 'No result';        
    }

    public function add_respond(Request $request)
    {       
            $text = Input::get('text');
            $news_id = Input::get('news_id');
            $reit = Input::get('reiting');

            App\Respond::add([$text, $news_id, $reit]);
            return Redirect::back();
    }


    public function show_sale(Request $request){
        return Redirect::back();    
    }


    public function contact(){
        return view('pages.contact');
    }

    public function productsPage()
    {
        $collection = App\Product::orderBy('created_at', 'desc');

        return view('pages.products')
                    ->with('products', $collection );
    }

    public function productsCategory($id)
    {
        $collection = App\Product::orderBy('created_at', 'desc');

        return view('pages.products')
                    ->with('products', $collection->where('category_id',$id)->get() );
    }

    public function productsReklams($id)
    {
        $collection = App\Product::orderBy('created_at', 'desc');

        return view('pages.products')
                    ->with('products', $collection->where('reklam_id',$id)->get() );
    }
}