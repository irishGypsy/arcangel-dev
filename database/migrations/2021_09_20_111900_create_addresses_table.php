<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('billing_first_name')->nullable();
            $table->string('billing_last_name')->nullable();
            $table->text('billing_address')->nullable();
            $table->string('billing_city')->nullable();
            $table->bigInteger('billing_state_id')->unsigned()->nullable();
            $table->foreign('billing_state_id')->references('id')->on('state_codes');
            $table->string('billing_zip')->nullable();
            $table->bigInteger('billing_countrycode_id')->unsigned()->nullable();
            $table->foreign('billing_countrycode_id')->references('id')->on('country_codes');
            $table->string('billing_phone_number')->nullable();
            $table->string('billing_email')->nullable();
            $table->string('shipping_first_name')->nullable();
            $table->string('shipping_last_name')->nullable();
            $table->text('shipping_address')->nullable();
            $table->string('shipping_city')->nullable();
            $table->bigInteger('shipping_state_id')->unsigned()->nullable();
            $table->foreign('shipping_state_id')->references('id')->on('state_codes');
            $table->string('shipping_zip')->nullable();
            $table->bigInteger('shipping_countrycode_id')->unsigned()->nullable();
            $table->foreign('shipping_countrycode_id')->references('id')->on('country_codes');
            $table->string('shipping_phone_number')->nullable();
            $table->string('shipping_email')->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        DB::table('addresses')->insert([
           [
               "billing_first_name" => "Joe",
               "billing_last_name" => "Brodnax",
               "billing_address" => "2342 Mockingbird Lane #13",
               "billing_city" => "Ghost Town",
               "billing_state_id" => 43,
               "billing_zip" => "77099",
               "billing_countrycode_id" => 234,
               "billing_phone_number" => "8328328324",
               "billing_email" => "joseph.brodnax@gmail.com",
               "shipping_first_name" => "Joe",
               "shipping_last_name" => "Brodnax",
               "shipping_address" => "2342 Mockingbird Lane #13",
               "shipping_city" => "Ghost Town",
               "shipping_state_id" => 43,
               "shipping_zip" => "77099",
               "shipping_countrycode_id" => 234,
               "shipping_phone_number" => "8328328324",
               "shipping_email" => "joseph.brodnax@gmail.com",
               "user_id" => 4
           ]
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
