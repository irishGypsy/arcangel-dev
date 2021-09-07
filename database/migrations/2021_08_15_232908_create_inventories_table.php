<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('inventories', function (Blueprint $table) {
//            $table->id();
//            $table->bigInteger('productID')->unsigned();
//            $table->enum('integrations', ['ebay','amazon','both'])->default(NULL)->nullable();
//            $table->integer('available_qty')->nullable();
//            $table->integer('amazon_qty')->nullable();
//            $table->integer('ebay_qty')->nullable();
//
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
        Schema::dropIfExists('inventories');
    }
}
