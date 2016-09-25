<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

Admin::model('App\Product')->title('Tovar')->display(function ()
{
	$display = AdminDisplay::datatables();
	 $display->with();
	 $display->filters([

	 ]);
	$display->columns([
		Column::string('name')->label('name'),
		Column::image('image'),
		Column::string('reklam.name')->label('adress'),
		Column::string('category.name')->label('adress2'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'name'),
		FormItem::image('image', 'Image'),
		FormItem::ckeditor('about', 'about'),
		FormItem::text('price', 'name'),
		FormItem::select('reklam_id', 'Права доступа')->model('App\Reklam')->display('name'),
		FormItem::select('category_id', 'Kateg')->model('App\Category')->display('name'),
	]);
	return $form;
});