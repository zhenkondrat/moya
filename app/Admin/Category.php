<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

Admin::model('App\Category')->title('Категория')->display(function ()
{
	$display = AdminDisplay::datatables();
	 $display->with();
	 $display->filters([

	 ]);
	$display->columns([
		Column::string('name')->label('Name'),
		Column::image('image'),
		Column::string('position')->label('Name'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Name')->required(),
		FormItem::image('image', 'Image'),
		FormItem::text('position', 'Name')->required(),
	]);
	return $form;
});