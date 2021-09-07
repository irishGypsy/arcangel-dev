<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductForeignkeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

//        Schema::table('products', function (Blueprint $table) {
//            $table->foreign('color_id')->references('id')->on('colors');
//            $table->foreign('material_id')->references('id')->on('materials');
//            $table->foreign('country_code_id')->references('id')->on('country_codes');
//
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('color_id');
            $table->dropColumn('material_id');
            $table->dropColumn('country_code_id');
        });
    }
}
