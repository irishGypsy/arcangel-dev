<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_packages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products');
            $table->bigInteger('package_id')->unsigned()->nullable();
            $table->foreign('package_id')->references('id')->on('packages');
            $table->boolean('checked')->default(1);
            $table->float('price_adjustment',8,2)->nullable();
            $table->timestamps();
        });

        DB::table('product_packages')->insert([
           [
                'product_id' => 2,
               'package_id' => 1,
               'checked' => 1,
               'price_adjustment' => 100.10
           ],
            [
                'product_id' => 2,
                'package_id' => 2,
                'checked' => 0,
                'price_adjustment' => 130.13

            ],
            [
                'product_id' => 2,
                'package_id' => 3,
               'checked' => 1,
               'price_adjustment' => 200.01
            ],
            [
                'product_id' => 3,
                'package_id' => 3,
                'checked' => 1,
                'price_adjustment' => 205
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
        Schema::dropIfExists('product_packages');
    }
}
