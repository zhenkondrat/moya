<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

Admin::model('App\News')->title('Новина')->display(function ()
{
	$display = AdminDisplay::datatables();
	 $display->with();
	 $display->filters([

	 ]);
	$display->columns([
		Column::string('header')->label('header'),
		Column::image('image'),
		Column::string('sale.name')->label('adress'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('header', 'header'),
		FormItem::image('image', 'Image'),
		FormItem::ckeditor('text', 'text'),
		FormItem::text('termin', 'name'),
		FormItem::checkbox('enabled', 'enabled'),
		FormItem::select('sale_id', 'Права доступа')->model('App\Sale')->display('name'),
	]);
	return $form;
});