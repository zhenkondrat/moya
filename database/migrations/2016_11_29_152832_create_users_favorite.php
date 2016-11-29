<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersFavorite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('reklam_id');
            $table->integer('user_id'); 
            $table->timestamps();
        });

         Schema::table('products', function($table) {
            $table->double("discount");    
        });

         Schema::table('reklams', function($table) {
            $table->string("pdf_file");    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('favorites');
        Schema::table('products', function($table) {
            $table->dropColumn("discount");    
        });
        Schema::table('reklams', function($table) {
            $table->dropColumn("pdf_file");    
        });
    }
}
