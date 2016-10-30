<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

Admin::model('App\Magazine')->title('Газетка/страница')->display(function ()
{
	$display = AdminDisplay::datatables();
	 $display->with();
	 $display->filters([

	 ]);
	$display->columns([
		Column::image('image')->label('Страница'),
		Column::string('reklam.name')->label('Рекламка/Акция'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::image('image', 'Картинка'),
		FormItem::select('reklam_id', 'Рекламка')->model('App\Reklam')->display('name'),
	]);
	return $form;
});