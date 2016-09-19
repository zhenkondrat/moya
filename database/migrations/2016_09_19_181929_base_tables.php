<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //the shop, action, magazine, product, shop_center, action_on_shop

        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adress');   //choose city and enter street
            $table->text('work_graph');
            $table->string('phone', 20);
            $table->string('name');
            $table->boolean('enabled')->default(0);
            $table->integer('sales_id');
            $table->timestamps();

            $table->index('sales_id');

        });
        DB::statement('ALTER TABLE shop ADD location POINT' );


        Schema::create('reklams', function (Blueprint $table) {
            $table->increments('id');            
            $table->timestamp('begin')->nullable();
            $table->timestamp('end')->nullable();
            $table->boolean('enabled')->default(0);
            $table->string('image');              
            $table->string('name');
            $table->text('about');
            $table->timestamps();
        });

        Schema::create('reklam_shop', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reklam_id')->unsigned();
            $table->integer('shop_id')->unsigned();
            $table->boolean('enabled')->default(0);
            $table->timestamps();
        });

        Schema::create('magazines', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('reklam_id');
            $table->string('image');  
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');     
            $table->string('name');  
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');     
            $table->string('name');  
            $table->text('about');  
            $table->double('price', 10, 2);  
            $table->string('image'); 
            $table->integer('reklam_id');
            $table->integer('category_id');
            $table->timestamps();
        });

         Schema::create('shop_center', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adress');   //choose city and enter street
            $table->text('work_graph');
            $table->string('phone', 20);
            $table->string('email', 30);
            $table->string('site_url', 30);
            $table->string('image');
            $table->string('name');
            $table->text('about');
            $table->boolean('enabled')->default(0);
            $table->timestamps();


        });
        DB::statement('ALTER TABLE shop_center ADD location POINT' );

        Schema::create('specials', function (Blueprint $table) {
            $table->increments('id');     
            $table->string('name');  
            $table->timestamps();
        });

        Schema::create('special_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('special_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->boolean('enabled')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shops');
        Schema::drop('reklams');
        Schema::drop('reklam_shop');
        Schema::drop('magazines');
        Schema::drop('categories');
        Schema::drop('products');
        Schema::drop('shop_center');
        Schema::drop('specials');
        Schema::drop('special_product');        
    }
}
