<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {

            //id primary key
            $table->bigIncrements('id');

            //order id
            $table->unsignedBigInteger('order_id')->index();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            //product id
            $table->unsignedBigInteger('product_id')->index();
            $table->foreign('product_id')->references('id')->on('products');

            //invoice price per???
            $table->integer('quantity');
            $table->float('price', 20, 2);

            //create on and modify on
            $table->timestamps();
        });

        DB::table('order_items')->insert([
            [
                "order_id"=>23,
                "product_id"=>7,
                "quantity"=>1,
                "price"=>"1478.23"
            ],
            [
                "order_id"=>25,
                "product_id"=>7,
                "quantity"=>3,
                "price"=>"1429.51"
            ],
            [
                "order_id"=>10,
                "product_id"=>1,
                "quantity"=>3,
                "price"=>"572.36"
            ],
            [
                "order_id"=>7,
                "product_id"=>4,
                "quantity"=>1,
                "price"=>"720.23"
            ],
            [
                "order_id"=>21,
                "product_id"=>8,
                "quantity"=>3,
                "price"=>"2125.70"
            ],
            [
                "order_id"=>18,
                "product_id"=>8,
                "quantity"=>3,
                "price"=>"1557.56"
            ],
            [
                "order_id"=>9,
                "product_id"=>1,
                "quantity"=>2,
                "price"=>"2558.20"
            ],
            [
                "order_id"=>23,
                "product_id"=>6,
                "quantity"=>3,
                "price"=>"1039.01"
            ],
            [
                "order_id"=>14,
                "product_id"=>9,
                "quantity"=>2,
                "price"=>"1731.73"
            ],
            [
                "order_id"=>13,
                "product_id"=>5,
                "quantity"=>4,
                "price"=>"1438.26"
            ],
            [
                "order_id"=>24,
                "product_id"=>5,
                "quantity"=>2,
                "price"=>"2355.29"
            ],
            [
                "order_id"=>26,
                "product_id"=>7,
                "quantity"=>4,
                "price"=>"1169.13"
            ],
            [
                "order_id"=>7,
                "product_id"=>10,
                "quantity"=>1,
                "price"=>"537.07"
            ],
            [
                "order_id"=>40,
                "product_id"=>3,
                "quantity"=>3,
                "price"=>"1268.75"
            ],
            [
                "order_id"=>23,
                "product_id"=>4,
                "quantity"=>3,
                "price"=>"1823.66"
            ],
            [
                "order_id"=>26,
                "product_id"=>3,
                "quantity"=>4,
                "price"=>"1985.86"
            ],
            [
                "order_id"=>8,
                "product_id"=>5,
                "quantity"=>2,
                "price"=>"716.61"
            ],
            [
                "order_id"=>25,
                "product_id"=>8,
                "quantity"=>4,
                "price"=>"1086.55"
            ],
            [
                "order_id"=>31,
                "product_id"=>8,
                "quantity"=>4,
                "price"=>"794.84"
            ],
            [
                "order_id"=>6,
                "product_id"=>4,
                "quantity"=>2,
                "price"=>"1815.21"
            ],
            [
                "order_id"=>24,
                "product_id"=>2,
                "quantity"=>4,
                "price"=>"2388.95"
            ],
            [
                "order_id"=>40,
                "product_id"=>10,
                "quantity"=>4,
                "price"=>"802.05"
            ],
            [
                "order_id"=>33,
                "product_id"=>4,
                "quantity"=>4,
                "price"=>"1580.64"
            ],
            [
                "order_id"=>17,
                "product_id"=>10,
                "quantity"=>2,
                "price"=>"2364.11"
            ],
            [
                "order_id"=>21,
                "product_id"=>7,
                "quantity"=>4,
                "price"=>"1590.12"
            ],
            [
                "order_id"=>6,
                "product_id"=>9,
                "quantity"=>3,
                "price"=>"2486.20"
            ],
            [
                "order_id"=>39,
                "product_id"=>5,
                "quantity"=>2,
                "price"=>"1256.37"
            ],
            [
                "order_id"=>13,
                "product_id"=>7,
                "quantity"=>4,
                "price"=>"1172.45"
            ],
            [
                "order_id"=>37,
                "product_id"=>7,
                "quantity"=>3,
                "price"=>"552.64"
            ],
            [
                "order_id"=>3,
                "product_id"=>5,
                "quantity"=>2,
                "price"=>"1387.91"
            ],
            [
                "order_id"=>21,
                "product_id"=>5,
                "quantity"=>4,
                "price"=>"519.46"
            ],
            [
                "order_id"=>9,
                "product_id"=>8,
                "quantity"=>3,
                "price"=>"616.76"
            ],
            [
                "order_id"=>28,
                "product_id"=>2,
                "quantity"=>3,
                "price"=>"1992.01"
            ],
            [
                "order_id"=>22,
                "product_id"=>10,
                "quantity"=>2,
                "price"=>"591.46"
            ],
            [
                "order_id"=>39,
                "product_id"=>9,
                "quantity"=>3,
                "price"=>"1200.74"
            ],
            [
                "order_id"=>13,
                "product_id"=>6,
                "quantity"=>1,
                "price"=>"930.46"
            ],
            [
                "order_id"=>39,
                "product_id"=>10,
                "quantity"=>4,
                "price"=>"1755.13"
            ],
            [
                "order_id"=>29,
                "product_id"=>4,
                "quantity"=>3,
                "price"=>"1093.61"
            ],
            [
                "order_id"=>5,
                "product_id"=>8,
                "quantity"=>1,
                "price"=>"1595.23"
            ],
            [
                "order_id"=>23,
                "product_id"=>4,
                "quantity"=>2,
                "price"=>"1233.87"
            ],
            [
                "order_id"=>9,
                "product_id"=>1,
                "quantity"=>4,
                "price"=>"1286.72"
            ],
            [
                "order_id"=>26,
                "product_id"=>9,
                "quantity"=>3,
                "price"=>"2280.35"
            ],
            [
                "order_id"=>36,
                "product_id"=>9,
                "quantity"=>3,
                "price"=>"1161.54"
            ],
            [
                "order_id"=>3,
                "product_id"=>10,
                "quantity"=>2,
                "price"=>"2003.46"
            ],
            [
                "order_id"=>9,
                "product_id"=>5,
                "quantity"=>2,
                "price"=>"1637.95"
            ],
            [
                "order_id"=>32,
                "product_id"=>2,
                "quantity"=>2,
                "price"=>"492.47"
            ],
            [
                "order_id"=>19,
                "product_id"=>4,
                "quantity"=>1,
                "price"=>"1799.96"
            ],
            [
                "order_id"=>20,
                "product_id"=>10,
                "quantity"=>1,
                "price"=>"1480.79"
            ],
            [
                "order_id"=>13,
                "product_id"=>4,
                "quantity"=>3,
                "price"=>"1154.71"
            ],
            [
                "order_id"=>7,
                "product_id"=>5,
                "quantity"=>4,
                "price"=>"2228.99"
            ],
            [
                "order_id"=>20,
                "product_id"=>6,
                "quantity"=>4,
                "price"=>"1541.20"
            ],
            [
                "order_id"=>35,
                "product_id"=>3,
                "quantity"=>1,
                "price"=>"1530.30"
            ],
            [
                "order_id"=>32,
                "product_id"=>4,
                "quantity"=>3,
                "price"=>"2462.87"
            ],
            [
                "order_id"=>21,
                "product_id"=>5,
                "quantity"=>2,
                "price"=>"2425.66"
            ],
            [
                "order_id"=>28,
                "product_id"=>1,
                "quantity"=>4,
                "price"=>"436.05"
            ],
            [
                "order_id"=>22,
                "product_id"=>2,
                "quantity"=>2,
                "price"=>"1644.22"
            ],
            [
                "order_id"=>8,
                "product_id"=>5,
                "quantity"=>2,
                "price"=>"2122.89"
            ],
            [
                "order_id"=>40,
                "product_id"=>7,
                "quantity"=>1,
                "price"=>"2087.78"
            ],
            [
                "order_id"=>2,
                "product_id"=>2,
                "quantity"=>4,
                "price"=>"1676.24"
            ],
            [
                "order_id"=>24,
                "product_id"=>2,
                "quantity"=>4,
                "price"=>"2000.10"
            ],
            [
                "order_id"=>30,
                "product_id"=>8,
                "quantity"=>4,
                "price"=>"1965.04"
            ],
            [
                "order_id"=>33,
                "product_id"=>7,
                "quantity"=>3,
                "price"=>"1124.07"
            ],
            [
                "order_id"=>21,
                "product_id"=>9,
                "quantity"=>1,
                "price"=>"805.92"
            ],
            [
                "order_id"=>35,
                "product_id"=>5,
                "quantity"=>2,
                "price"=>"1458.85"
            ],
            [
                "order_id"=>7,
                "product_id"=>4,
                "quantity"=>1,
                "price"=>"1975.14"
            ],
            [
                "order_id"=>29,
                "product_id"=>5,
                "quantity"=>2,
                "price"=>"1846.59"
            ],
            [
                "order_id"=>7,
                "product_id"=>7,
                "quantity"=>2,
                "price"=>"1363.28"
            ],
            [
                "order_id"=>3,
                "product_id"=>5,
                "quantity"=>4,
                "price"=>"1803.36"
            ],
            [
                "order_id"=>35,
                "product_id"=>9,
                "quantity"=>4,
                "price"=>"2064.61"
            ],
            [
                "order_id"=>5,
                "product_id"=>2,
                "quantity"=>1,
                "price"=>"2347.82"
            ],
            [
                "order_id"=>39,
                "product_id"=>9,
                "quantity"=>3,
                "price"=>"2470.83"
            ],
            [
                "order_id"=>11,
                "product_id"=>6,
                "quantity"=>2,
                "price"=>"1774.26"
            ],
            [
                "order_id"=>36,
                "product_id"=>8,
                "quantity"=>3,
                "price"=>"2315.17"
            ],
            [
                "order_id"=>8,
                "product_id"=>10,
                "quantity"=>3,
                "price"=>"2055.90"
            ],
            [
                "order_id"=>40,
                "product_id"=>6,
                "quantity"=>4,
                "price"=>"1222.70"
            ],
            [
                "order_id"=>16,
                "product_id"=>8,
                "quantity"=>4,
                "price"=>"554.99"
            ],
            [
                "order_id"=>3,
                "product_id"=>2,
                "quantity"=>4,
                "price"=>"1304.42"
            ],
            [
                "order_id"=>34,
                "product_id"=>9,
                "quantity"=>3,
                "price"=>"671.61"
            ],
            [
                "order_id"=>21,
                "product_id"=>8,
                "quantity"=>2,
                "price"=>"1776.54"
            ],
            [
                "order_id"=>20,
                "product_id"=>5,
                "quantity"=>2,
                "price"=>"1969.85"
            ],
            [
                "order_id"=>22,
                "product_id"=>10,
                "quantity"=>3,
                "price"=>"2054.78"
            ],
            [
                "order_id"=>31,
                "product_id"=>5,
                "quantity"=>4,
                "price"=>"1850.68"
            ],
            [
                "order_id"=>32,
                "product_id"=>2,
                "quantity"=>3,
                "price"=>"839.83"
            ],
            [
                "order_id"=>1,
                "product_id"=>3,
                "quantity"=>4,
                "price"=>"411.72"
            ],
            [
                "order_id"=>27,
                "product_id"=>4,
                "quantity"=>4,
                "price"=>"665.31"
            ],
            [
                "order_id"=>30,
                "product_id"=>10,
                "quantity"=>1,
                "price"=>"2053.52"
            ],
            [
                "order_id"=>5,
                "product_id"=>8,
                "quantity"=>4,
                "price"=>"1350.34"
            ],
            [
                "order_id"=>36,
                "product_id"=>7,
                "quantity"=>4,
                "price"=>"711.67"
            ],
            [
                "order_id"=>35,
                "product_id"=>3,
                "quantity"=>2,
                "price"=>"1974.10"
            ],
            [
                "order_id"=>31,
                "product_id"=>10,
                "quantity"=>3,
                "price"=>"2356.27"
            ],
            [
                "order_id"=>31,
                "product_id"=>7,
                "quantity"=>4,
                "price"=>"1697.67"
            ],
            [
                "order_id"=>31,
                "product_id"=>10,
                "quantity"=>2,
                "price"=>"1902.24"
            ],
            [
                "order_id"=>33,
                "product_id"=>10,
                "quantity"=>4,
                "price"=>"1675.28"
            ],
            [
                "order_id"=>12,
                "product_id"=>4,
                "quantity"=>2,
                "price"=>"1399.58"
            ],
            [
                "order_id"=>20,
                "product_id"=>7,
                "quantity"=>2,
                "price"=>"532.49"
            ],
            [
                "order_id"=>5,
                "product_id"=>9,
                "quantity"=>3,
                "price"=>"1388.90"
            ],
            [
                "order_id"=>20,
                "product_id"=>4,
                "quantity"=>4,
                "price"=>"1357.85"
            ],
            [
                "order_id"=>28,
                "product_id"=>8,
                "quantity"=>2,
                "price"=>"953.53"
            ],
            [
                "order_id"=>15,
                "product_id"=>3,
                "quantity"=>2,
                "price"=>"1417.31"
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
        Schema::dropIfExists('order_items');
    }
}
