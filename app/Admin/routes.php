<?php

Route::get('', [
	'as' => 'admin.home',
	function ()
	{
		$content = 'Здесь Вы можете добавлять данные на сайт';
		return Admin::view($content, 'Админ панель');
	}
]);
