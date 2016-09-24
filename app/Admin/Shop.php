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
		FormItem::text('phone', 'phone'),
		FormItem::checkbox('enabled', 'enabled'),
		FormItem::select('sales_id', 'Права доступа')->model('App\Sale')->display('adress'),
	]);
	return $form;
});