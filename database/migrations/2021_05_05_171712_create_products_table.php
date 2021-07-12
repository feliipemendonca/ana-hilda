<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integer('increments');
            $table->uuid('id')->primary();
            $table->text('estado')->nullable();
            $table->text('cidade')->nullable();
            $table->text('bairro')->nullable();
            $table->text('cod')->nullable();
            $table->integer('room')->nullable();
            $table->integer('suite')->nullable();
            $table->integer('restroom')->nullable();
            $table->integer('vacany')->nullable();
            $table->integer('useful_area')->nullable();
            $table->integer('total_area')->nullable();
            $table->integer('walk')->nullable();
            $table->float('condominium')->nullable();
            $table->float('iptu')->nullable();
            $table->text('title');
            $table->text('about')->nullable();
            $table->string('value')->nullable();
            $table->text('slug');
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
        Schema::dropIfExists('products');
    }
}
