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
		Column::string('name')->label('Название'),
		Column::image('image'),
		Column::string('position')->label('Позицыя'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Название')->required(),
		FormItem::image('image', 'Картинка'),
		FormItem::text('position', 'Позицыя')->required(),
	]);
	return $form;
});