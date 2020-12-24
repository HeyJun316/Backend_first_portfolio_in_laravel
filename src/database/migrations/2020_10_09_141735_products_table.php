<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->unsignedBigInteger('bland_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('price');
            $table->text('detail');
            $table->string('image', 255);
            $table->unsignedBigInteger('stock');
            $table->timestamps();
            $table->unique('product_name', 'unique_product_name');

            $table
                ->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table
                ->foreign('bland_id')
                ->references('id')
                ->on('blands')
                ->onDelete('cascade');
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
