<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->uuid('type_products_id')->after('id')->changer()->nullable();
            $table->foreign('type_products_id')->references('id')->on('type_products')->onDelete('cascade');
            $table->uuid('category_products_id')->after('id')->changer()->nullable();
            $table->foreign('category_products_id')->references('id')->on('category_products')->onDelete('cascade');
            $table->uuid('location_products_id')->after('id')->changer()->nullable();
            $table->foreign('location_products_id')->references('id')->on('location_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['type_products_id']);
            $table->dropForeign(['location_products_id']);
            $table->dropForeign(['category_products_id']);
            $table->dropColumn(['type_products_id','location_products_id','category_products_id']);
        });
    }
}
