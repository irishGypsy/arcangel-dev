<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('colors', function (Blueprint $table) {
//            $table->id();
//            $table->string('name')->nullable();
//            $table->string('code')->nullable();
//            $table->integer('entry_by')->nullable();
//            $table->enum('status',['Active','Inactive'])->nullable()->default('Active');
//            $table->string('ip_addr')->nullable();
//            $table->integer('rc')->nullable();
//            $table->integer('cca')->nullable();
//            $table->integer('capacity')->nullable();
//
//            $table->timestamps();
//        });
//
//        DB::table('colors')->insert([
//            [
//                'name' => 'Green',
//                'code' => 'grn'
//            ],
//            [
//                'name' => 'Blue',
//                'code' => 'aqua'
//            ],
//            [
//                'name' => 'Mauve',
//                'code' => 'purple'
//            ]
//        ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colors');
    }
}
