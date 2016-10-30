<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use Session;

class EnquiryController extends Controller {

	public function index()
	{
	    $data = Input::all();
	    $rules = array(
		  	'first_name' => 'required|alpha',
		  	'email' => 'required|email',
			'g-recaptcha-response' => 'required|captcha',
			'messager' => 'required',
		);
		$validator = Validator::make($data, $rules);
		if ($validator->fails()){
			// dd($validator);
		    return Redirect::to('/contacts')->withInput()->withErrors($validator);
		}
		else{
			//Send email using Laravel send function
			\Mail::send('mail.email', $data, function($message) use ($data)
			{
				//email 'From' field: Get users email add and name
				$message->from($data['email'] , $data['first_name']);
				//email 'To' field: cahnge this to emails that you want to be notified. 
				$message->to('zhenkondrat@meta.ua', 'my name')->subject('contact request');

			});
			
		    return Redirect::to('/');
		}
	}

	
}