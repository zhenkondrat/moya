<?php

Admin::menu()->label('Пользователи')->icon('fa-users')->items(function ()
{
    Admin::menu(App\Permit::class)->label('Права')->icon('fa-key');
    Admin::menu(App\Role::class)->label('Роли')->icon('fa-graduation-cap');
    Admin::menu(App\User::class)->label('Юзеры')->icon('fa-user');
});


Admin::menu()->label('Сети')->icon('fa-building')->items(function ()
{
    Admin::menu(App\Sale::class)->label('Торовые сети')->icon('fa-hand-o-down');
    Admin::menu(App\Shop::class)->label('Магазины')->icon('fa-compass');
    // Admin::menu(App\User::class)->label('Торговые центры')->icon('fa-building');
});
Admin::menu()->label('Акции/Рекламки')->icon('fa-calendar')->items(function ()
{	
    Admin::menu(App\Reklam::class)->label('Рекламка')->icon('fa-asterisk');
    Admin::menu(App\Magazine::class)->label('Страница')->icon('fa-file-image-o');
});

Admin::menu()->label('Товар')->icon('fa-tags')->items(function ()
{
	Admin::menu(App\Category::class)->label('Категория товаров')->icon('fa-bars');
    Admin::menu(App\Product::class)->label('Товар')->icon('fa-tag');
});


Admin::menu(App\News::class)->label('Новости')->icon('fa-book');