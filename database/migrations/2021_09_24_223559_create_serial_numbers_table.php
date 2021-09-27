<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSerialNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serial_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('serial_number')->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products');
            $table->bigInteger('order_id')->unsigned()->nullable();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->timestamps();
        });

        DB::table('serial_numbers')->insert([
            [
                "serial_number" => "LNN03UJE6QI",
                "user_id" => 2,
                "product_id" => 5,
                "order_id" => 5
            ],
            [
                "serial_number" => "YPF41HTD2VN",
                "user_id" => 3,
                "product_id" => 3,
                "order_id" => 4
            ],
            [
                "serial_number" => "FYB25XLD7QX",
                "user_id" => 1,
                "product_id" => 9,
                "order_id" => 10
            ],
            [
                "serial_number" => "USE40FWQ8IJ",
                "user_id" => 2,
                "product_id" => 1,
                "order_id" => 2
            ],
            [
                "serial_number" => "VHY71HCW1DN",
                "user_id" => 4,
                "product_id" => 9,
                "order_id" => 2
            ],
            [
                "serial_number" => "FAS59GGE0BA",
                "user_id" => 4,
                "product_id" => 2,
                "order_id" => 3
            ],
            [
                "serial_number" => "GBG28WXS4DO",
                "user_id" => 2,
                "product_id" => 7,
                "order_id" => 1
            ],
            [
                "serial_number" => "EZJ03UMA3PN",
                "user_id" => 1,
                "product_id" => 2,
                "order_id" => 8
            ],
            [
                "serial_number" => "IFJ54WUC1RL",
                "user_id" => 2,
                "product_id" => 2,
                "order_id" => 4
            ],
            [
                "serial_number" => "MHC72BET6VM",
                "user_id" => 3,
                "product_id" => 6,
                "order_id" => 1
            ],
            [
                "serial_number" => "GBG13DQM5SM",
                "user_id" => 1,
                "product_id" => 9,
                "order_id" => 1
            ],
            [
                "serial_number" => "KWH22UCV7XF",
                "user_id" => 1,
                "product_id" => 7,
                "order_id" => 9
            ],
            [
                "serial_number" => "RXN58FWK6WB",
                "user_id" => 3,
                "product_id" => 2,
                "order_id" => 9
            ],
            [
                "serial_number" => "EWB18PTC7BG",
                "user_id" => 1,
                "product_id" => 3,
                "order_id" => 3
            ],
            [
                "serial_number" => "YUI68QHR1JR",
                "user_id" => 2,
                "product_id" => 9,
                "order_id" => 7
            ],
            [
                "serial_number" => "RVH70BKF5BT",
                "user_id" => 2,
                "product_id" => 1,
                "order_id" => 1
            ],
            [
                "serial_number" => "WIY76DBV5YT",
                "user_id" => 1,
                "product_id" => 2,
                "order_id" => 9
            ],
            [
                "serial_number" => "QKI82UGS6SR",
                "user_id" => 3,
                "product_id" => 10,
                "order_id" => 1
            ],
            [
                "serial_number" => "TEW25VQP2LP",
                "user_id" => 1,
                "product_id" => 7,
                "order_id" => 1
            ],
            [
                "serial_number" => "HJS47AZA3RW",
                "user_id" => 3,
                "product_id" => 3,
                "order_id" => 6
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
        Schema::dropIfExists('serial_numbers');
    }
}
