<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('category_id');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('quantity')->default('0');
            $table->float('rate')->default('0');
            $table->double('price');
            $table->boolean('status');
            $table->integer('sum_comment')->default('0');
            $table->integer('sum_rate')->default('0');
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
