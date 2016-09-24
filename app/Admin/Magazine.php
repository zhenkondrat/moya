<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

Admin::model('App\Magazine')->title('Gazetka')->display(function ()
{
	$display = AdminDisplay::datatables();
	 $display->with();
	 $display->filters([

	 ]);
	$display->columns([
		Column::image('image')->label('name'),
		Column::string('reklam.name')->label('adress'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::image('image', 'Image'),
		FormItem::select('reklam_id', 'Права доступа')->model('App\Reklam')->display('name'),
	]);
	return $form;
});