<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsHasOptionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_has_optionals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('products_id');
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
            $table->uuid('optionals_products_id');
            $table->foreign('optionals_products_id')->references('id')->on('optionals_products')->onDelete('cascade');
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
        Schema::dropIfExists('products_has_optionals');
    }
}
