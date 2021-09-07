<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductShippingInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_shipping_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products');
            $table->float('length',8,2)->nullable();
            $table->float('width',8,2)->nullable();
            $table->float('height',8,2)->nullable();
            $table->float('weight',8,2)->nullable();
            $table->boolean('is_fragile')->nullable();
            $table->string('power_plug')->nullable();
            $table->boolean('has_plug')->nullable();
            $table->boolean('has_batteries')->nullable();
            $table->boolean('has_batteries_power')->nullable();
            $table->boolean('product_instructions')->nullable();
            $table->string('delivery_time')->nullable();
            $table->string('replacement_time')->nullable();
            $table->float('shipping_uk',8,2)->nullable();
            $table->float('shipping_europe',8,2)->nullable();
            $table->float('shipping_global',8,2)->nullable();

            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::table('product_shipping_infos')->insert([
           [
               "product_id" => "1"
           ],
            [
                "product_id" => "2"
            ],
            [
                "product_id" => "3"
            ],
            [
                "product_id" => "4"
            ],
            [
                "product_id" => "5"
            ],
            [
                "product_id" => "6"
            ],
            [
                "product_id" => "7"
            ],
            [
                "product_id" => "8"
            ],
            [
                "product_id" => "9"
            ],
            [
                "product_id" => "10"
            ],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_shipping_infos');
    }
}
