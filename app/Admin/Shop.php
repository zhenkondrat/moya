<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

Admin::model('App\Shop')->title('Магазин')->display(function ()
{
	$display = AdminDisplay::table();
	$display->columns([
		Column::string('name')->label('Название'),
		Column::string('adress')->label('Адресс'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Название'),
		FormItem::text('adress', 'Адресс'),
		FormItem::ckeditor('work_graph', 'Робочий график'),
		FormItem::text('phone', 'Телефон')->defaultValue('0971234567'),
		FormItem::checkbox('enabled', 'Доступность'),
		FormItem::select('sale_id', 'Торговая сеть')->model('App\Sale')->display('name'),
		FormItem::text('lat', 'lat')->readonly(true),
		FormItem::text('lng', 'lng')->readonly(true),
		FormItem::view('widgets._form_map')
	]);
	return $form;
});