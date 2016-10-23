<?php

Admin::menu()->label('Пользователи')->icon('fa-users')->items(function ()
{
    Admin::menu(App\Permit::class)->label('Права')->icon('fa-key');
    Admin::menu(App\Role::class)->label('Роли')->icon('fa-graduation-cap');
    Admin::menu(App\User::class)->label('Юзеры')->icon('fa-user');
});


Admin::menu()->label('Основные данные')->icon('fa-building')->items(function ()
{
    Admin::menu(App\Sale::class)->label('Торовые сети')->icon('fa-key');
    Admin::menu(App\Shop::class)->label('Магазины')->icon('fa-graduation-cap');
    Admin::menu(App\Reklam::class)->label('Рекламка')->icon('fa-graduation-cap');
    Admin::menu(App\Magazine::class)->label('Gazetka')->icon('fa-graduation-cap');
    Admin::menu(App\Product::class)->label('Tovar')->icon('fa-graduation-cap');
    // Admin::menu(App\User::class)->label('Торговые центры')->icon('fa-user');
});

Admin::menu(App\Category::class)->label('Категория товаров')->icon('fa-shopping-cart');
Admin::menu(App\News::class)->label('Новости')->icon('fa-shopping-cart');