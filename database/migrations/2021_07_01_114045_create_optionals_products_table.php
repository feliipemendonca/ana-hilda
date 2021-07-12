<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionalsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('optionals_products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('category_optional_products_id');
            $table->foreign('category_optional_products_id')->references('id')->on('category_optional_products')->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
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
        Schema::dropIfExists('optionals_products');
    }
}
