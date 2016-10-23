<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateShopsSaleId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shops', function($table) {
            $table->dropColumn('sales_id');
            $table->integer("sale_id");    
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
            $table->integer('sales_id');
            $table->dropColumn("sale_id");    
        });
    }
}
