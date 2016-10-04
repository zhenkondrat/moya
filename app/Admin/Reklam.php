<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

Admin::model('App\Reklam')->title('Рекламка')->display(function ()
{
	$display = AdminDisplay::datatables();
	 $display->with();
	 $display->filters([

	 ]);
	// $display = AdminDisplay::table();
	$display->columns([
		Column::string('name')->label('name'),
		Column::image('image'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'name'),
		FormItem::image('image', 'Image'),
		FormItem::ckeditor('about', 'about'),
		FormItem::date('begin', 'Date'),
		FormItem::date('end', 'Date'),
		FormItem::multiselect('shops', 'Магазины')->model('App\Shop')->display('name'),
		FormItem::checkbox('enabled', 'enabled'),
		// FormItem::select('sales_id', 'Права доступа')->model('App\Sale')->display('name'),
	]);
	return $form;
});