<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_product', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedinteger('image_id');
            //$table->unsignedinteger('product_id');

            // $table->unsignedinteger('image_id');

            // $table->integer('product_id');
            // $table->integer('image_id');
            // $table->foreign('image_id')->references('id')->on('images');

            // $table->foreign('product_id')->references('id')->on('products');

            $table->foreign('image_id')
                ->references('id')
                ->on('images')
                ->onDelete('cascade');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
            $table->unsignedinteger('product_id');




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
        Schema::dropIfExists('image_product');
    }
}
