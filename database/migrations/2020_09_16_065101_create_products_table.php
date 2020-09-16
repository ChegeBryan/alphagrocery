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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('product_parameter_id');
            $table->string('product_name');
            $table->string('product_description');
            $table->float('product_price', 10, 2);
            $table->bigInteger('product_quantity');
            $table->text('product_image');
            $table->timestamps();
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('restrict');
            $table->foreign('subcategory_id')
                ->references('id')->on('subcategories')
                ->onDelete('setnull');
            $table->foreign('store_id')
                ->references('id')->on('stores')
                ->onDelete('cascade');
            $table->foreign('product_parameter_id')
                ->references('id')->on('product_parameters')
                ->onDelete('restrict')
                ->onUpdate('cascade');
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
