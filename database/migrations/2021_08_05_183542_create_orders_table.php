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
            $table->string('order_number')->unique();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->enum('status', ['pending', 'processing', 'completed', 'decline'])->default('pending');
            $table->decimal('grand_total', 20, 6);
            $table->unsignedInteger('item_count');

            $table->boolean('payment_status')->default(1);
            $table->string('payment_method')->nullable();

            $table->string('billing_first_name')->nullable();
            $table->string('billing_last_name')->nullable();
            $table->text('billing_address')->nullable();
            $table->string('billing_city')->nullable();
            $table->bigInteger('billing_state')->unsigned()->nullable();
            $table->foreign('billing_state')->on('state_codes')->references('id');
            $table->bigInteger('billing_country')->unsigned()->nullable();
            $table->foreign('billing_country')->on('country_codes')->references('id');
            $table->string('billing_post_code')->nullable();
            $table->string('billing_phone_number')->nullable();

            $table->string('shipping_first_name')->nullable();
            $table->string('shipping_last_name')->nullable();
            $table->text('shipping_address')->nullable();
            $table->string('shipping_city')->nullable();
            $table->bigInteger('shipping_state')->unsigned()->nullable();
            $table->foreign('shipping_state')->on('state_codes')->references('id');
            $table->bigInteger('shipping_country')->unsigned()->nullable();
            $table->foreign('shipping_country')->on('country_codes')->references('id');
            $table->string('shipping_post_code')->nullable();
            $table->string('shipping_phone_number')->nullable();
            $table->text('notes')->nullable();

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
