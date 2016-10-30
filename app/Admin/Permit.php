<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

Admin::model('App\Permit')->title('Права пользователей')->display(function ()
{
	$display = AdminDisplay::table();
	$display->columns([
		Column::string('name')->label('Название'),
		Column::string('slug')->label('slug'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Название')->required(),
		FormItem::text('slug', 'Slug')->required()->unique(),
	]);
	return $form;
});