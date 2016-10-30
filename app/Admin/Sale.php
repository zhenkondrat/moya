<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

Admin::model('App\Sale')->title('Торговые сети')->display(function ()
{
	$display = AdminDisplay::table();
	$display->columns([
		Column::string('name')->label('Название'),
		Column::string('site_url')->label('Адрес url'),
		Column::image('logo')->label('Логотип'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Название'),
		FormItem::text('full_name', 'Полное название'),
		FormItem::text('site_url', 'url'),
		FormItem::text('email', 'Email'),
		FormItem::ckeditor('about', 'О торговой сети'),
		FormItem::image('logo', 'Логотип'),
	]);
	return $form;
});