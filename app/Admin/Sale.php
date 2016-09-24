<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

Admin::model('App\Sale')->title('Торговые сети')->display(function ()
{
	$display = AdminDisplay::table();
	$display->columns([
		Column::string('name')->label('name'),
		Column::string('site_url')->label('site_url'),
		Column::image('logo'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'name'),
		FormItem::text('full_name', 'full_name'),
		FormItem::text('site_url', 'site_url'),
		FormItem::text('email', 'Email'),
		FormItem::ckeditor('about', 'about'),
		FormItem::image('logo', 'Image'),
	]);
	return $form;
});