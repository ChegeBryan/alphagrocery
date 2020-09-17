<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('shipping_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('store_id')->nullable();
            $table->string('store_name');
            $table->string('product_name');
            $table->string('product_image');
            $table->integer('product_quantity');
            $table->string('order_status')->default('Placed');
            $table->float('order_subtotal', 10, 2);
            $table->foreign('customer_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('shipping_id')
                ->references('id')->on('shippings')
                ->onDelete('set null');
            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('set null');
            $table->foreign('store_id')
                ->references('id')->on('stores')
                ->onDelete('set null');
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
        Schema::dropIfExists('orders');
    }
}
