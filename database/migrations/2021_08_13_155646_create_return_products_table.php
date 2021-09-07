<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('return_products', function (Blueprint $table) {
//            $table->id();
//            $table->unsignedBigInteger('user_id')->nullable();
//            //$table->foreign('userID')->references('id')->on('users');
//            $table->unsignedBigInteger('order_id')->nullable();
//            //$table->foreign('orderID')->references('id')->on('orders');
//            $table->string('product_name')->nullable();
//            $table->string('reason');
//            $table->enum('status', ['Active','Inactive'])->default('Active');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('return_products');
    }
}
