<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('productID')->unsigned()->nullable();
            $table->foreign('productID')->references('id')->on('products')->onDelete('cascade');
            $table->enum('integrations', ['Ebay','Amazon','Both'])->default(NULL)->nullable();
            $table->integer('available_qty')->nullable();
            $table->integer('amazon_qty')->nullable();
            $table->integer('ebay_qty')->nullable();
            $table->string('amazon_listing_id')->nullable();
            $table->string('ebay_listing_id')->nullable();
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
        Schema::dropIfExists('inventories');
    }
}
