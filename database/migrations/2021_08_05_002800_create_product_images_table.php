<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->index()->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->timestamps();
        });

        DB::table('product_images')->insert([
            [
                "product_id" => "1",
                "image" => "products/group49starting.jpg"
            ],
            [
                "product_id" => "2",
                "image" => "products/group48starting.jpg"
            ],
            [
                "product_id" => "3",
                "image" => "products/group47starting.jpg"
            ],
            [
                "product_id" => "4",
                "image" => "products/group24Fstarting.jpg"
            ],
            [
                "product_id" => "5",
                "image" => "products/group51starting.jpg"
            ],
            [
                "product_id" => "6",
                "image" => "products/group40Rstarting.jpg"
            ],
            [
                "product_id" => "7",
                "image" => "products/group35starting.jpg"
            ],
            [
                "product_id" => "8",
                "image" => "products/group94Rstarting.jpg"
            ],
            [
                "product_id" => "9",
                "image" => "products/48Vbattery.jpg"
            ],
            [
                "product_id" => "10",
                "image" => "products/48Vgolfcart.jpg"
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
        Schema::dropIfExists('product_images');
    }
}

