<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewAndEmailResp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');  
            $table->text('text');
            $table->string('header');
            $table->string('termin');
            $table->boolean('enabled')->default(0);
            $table->integer('sale_id');
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');  
            $table->text('text');
            $table->boolean('enabled')->default(0);
            $table->integer('new_id');
            $table->integer('user_id');
            $table->timestamps();
        });

        Schema::create('responds', function (Blueprint $table) {
            $table->increments('id');  
            $table->text('text');
            $table->integer('reiting');
            $table->boolean('enabled')->default(0);
            $table->integer('new_id');//sale_id
            $table->integer('user_id');
            $table->timestamps();
        });

        Schema::create('email_subs', function (Blueprint $table) {
            $table->increments('id');  
            $table->string('email');
            $table->boolean('enabled')->default(0);
            $table->integer('user_id');
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
        Schema::drop('news');
        Schema::drop('comments');
        Schema::drop('responds');
        Schema::drop('email_subs');
    }
}
