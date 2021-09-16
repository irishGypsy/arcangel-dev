<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliate_payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('affiliate_id')->unsigned()->nullable();
            $table->foreign('affiliate_id')->on('affiliates')->references('id');
            $table->bigInteger('order_id')->unsigned()->nullable();
            $table->foreign('order_id')->on('orders')->references('id');
            $table->float('amount',8,2)->nullable();
            $table->date('paid_date')->nullable();
            $table->enum('status',['Pending','Approved','Paid'])->default('Pending');

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
        Schema::dropIfExists('affiliate_payments');
    }
}
