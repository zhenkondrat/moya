<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'SiteController@startPage');
Route::get('sales', 'SiteController@salesPage');
Route::get('sale/{id}', 'SiteController@salePage');
Route::get('reklams', 'SiteController@reklamsPage');
Route::get('location', 'SiteController@locationPage');

Route::group(['middleware' => ['web']], function () {

	// Вызов страницы регистрации пользователя
	Route::get('register', 'AuthController@register');   
	// Пользователь заполнил форму регистрации и отправил
	Route::post('register', 'AuthController@registerProcess'); 
	// Пользователь получил письмо для активации аккаунта со ссылкой сюда
	Route::get('activate/{id}/{code}', 'AuthController@activate');
	// Вызов страницы авторизации
	Route::get('login', 'AuthController@login');
	// Пользователь заполнил форму авторизации и отправил
	Route::post('login', 'AuthController@loginProcess');
	// Выход пользователя из системы
	Route::get('logout', 'AuthController@logoutuser');
	// Пользователь забыл пароль и запросил сброс пароля. Это начало процесса - 
	// Страница с запросом E-Mail пользователя
	Route::get('reset', 'AuthController@resetOrder');
	// Пользователь заполнил и отправил форму с E-Mail в запросе на сброс пароля
	Route::post('reset', 'AuthController@resetOrderProcess');
	// Пользователю пришло письмо со ссылкой на эту страницу для ввода нового пароля
	Route::get('reset/{id}/{code}', 'AuthController@resetComplete');
	// Пользователь ввел новый пароль и отправил.
	Route::post('reset/{id}/{code}', 'AuthController@resetCompleteProcess');
	// Сервисная страничка, показываем после заполнения рег формы, формы сброса и т.
	// о том, что письмо отправлено и надо заглянуть в почтовый ящик.
	Route::get('wait', 'AuthController@wait');

});

Route::get('/attaches/{dateimg}/{filename}/{w}/{h}', function($dateimg , $filename,  $w, $h){
	$filepath = storage_path('attaches/' . $dateimg .'/'. $filename);
    $cacheimage = Image::cache(function($image) use( $filepath){
                return $image->make($filepath)->resize($w, $h);
	}, 129600, false);
    return Response::make($cacheimage, 200, array('Content-Type' => 'image/jpeg'));
});

    Route::get('attaches/{dateImg}/{filename}/{width}/{height}/{type?}/{anchor?}', 'ImageController@whResize');
    Route::get('attaches/{dateImg}/{filename}/', 'ImageController@fullImage');