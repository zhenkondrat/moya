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
		Column::string('header')->label('Заглавие'),
		Column::image('image')->label('Картинка'),
		Column::string('sale.name')->label('Торговая сеть'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('header', 'Заглавие'),
		FormItem::image('image', 'Картинка'),
		FormItem::ckeditor('text', 'Текст новости'),
		FormItem::text('termin', 'Термин'),
		FormItem::checkbox('enabled', 'Не показывать'),
		FormItem::select('sale_id', 'Торговая сеть')->model('App\Sale')->display('name'),
	]);
	return $form;
});