<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

Admin::model('App\Shop')->title('Магазин')->display(function ()
{
	$display = AdminDisplay::table();
	$display->columns([
		Column::string('name')->label('name'),
		Column::string('adress')->label('adress'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'name'),
		FormItem::text('adress', 'adress'),
		FormItem::ckeditor('work_graph', 'work_graph'),
		FormItem::text('phone', 'phone')->defaultValue('0971234567'),
		FormItem::checkbox('enabled', 'enabled'),
		FormItem::select('sale_id', 'Права доступа')->model('App\Sale')->display('name'),
		FormItem::text('lat', 'lat')->readonly(true),
		FormItem::text('lng', 'lng')->readonly(true),
		FormItem::view('widgets._form_map')
	]);
	return $form;
});