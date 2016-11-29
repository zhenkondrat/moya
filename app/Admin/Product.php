<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

Admin::model('App\Product')->title('Продукт')->display(function ()
{
	$display = AdminDisplay::datatables();
	 $display->with();
	 $display->filters([

	 ]);
	$display->columns([
		Column::string('name')->label('Название'),
		Column::image('image')->label('Картинка'),
		Column::string('reklam.name')->label('Рекламка'),
		Column::string('category.name')->label('Категория'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Название'),
		FormItem::image('image', 'Картинка'),
		FormItem::ckeditor('about', 'О продукте'),
		FormItem::text('price', 'Цена'),
		FormItem::text('discount', 'Скидка')->defaultValue("0"),
		FormItem::select('reklam_id', 'Рекламка')->model('App\Reklam')->display('name'),
		FormItem::select('category_id', 'Категория')->model('App\Category')->display('name'),
	]);
	return $form;
});