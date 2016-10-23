<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateShopLtln extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shops', function($table) {
            $table->double("lat");
            $table->double("lng");
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shops', function($table) {
            $table->dropColumn('lat');
            $table->dropColumn('lng');
        });
    }
}
