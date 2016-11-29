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
		Column::string('name')->label('Название'),
		Column::image('image')->label('Картинка'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Название'),
		FormItem::image('image', 'Картинка'),
		FormItem::file('pdf_file', 'PDF'),
		FormItem::ckeditor('about', 'О рекламке'),
		FormItem::date('begin', 'Дата начала'),
		FormItem::date('end', 'Дата конца'),
		FormItem::multiselect('shops', 'Магазины')->model('App\Shop')->display('name'),
		FormItem::checkbox('enabled', 'Доступность'),
		// FormItem::select('sales_id', 'Права доступа')->model('App\Sale')->display('name'),
	]);
	return $form;
});