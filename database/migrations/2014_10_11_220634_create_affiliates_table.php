<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class CreateAffiliatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliates', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['Pending','Active','Refused'])->default('Pending');
            $table->string('commission')->default('Product Base')->nullable();
            $table->string('bank_details')->default('N/A')->nullable();
            $table->string('comm_in_per')->default('10')->nullable();
            $table->string('affiliate_code')->nullable();
            $table->timestamps();
        });

    //        DB::table('affiliates')->insert([
//
//            [
//                "status"=>"Active",
//                "bank_details"=>"299489082",
//                "comm_in_per"=>"60",
//                "created_at" => now(),
//                "affiliate_code" => "905272",
//            ],
//
//            [
//                "username"=>"Donec.fringilla",
//                "fname"=>"Hashim",
//                "lname"=>"Dorsey",
//                "email"=>"Donec.non.justo@semper.com",
//                "status"=>"Active",
////                "countrycode_id"=>'180',
////                "commission"=>"91",
//                "bank_details"=>"321826679",
//                "comm_in_per"=>"63",
//                "created_at" => now(),
//                "affiliate_code" => "776541",
//                "password" => bcrypt("password1")],
//
//            ["username"=>"hendrerit",
//                "fname"=>"Chadwick",
//                "lname"=>"Vance",
//                "email"=>"non.feugiat@imperdietdictummagna.edu",
//                "status"=>"Active",
////                "countrycode_id"=>'130',
////                "commission"=>"77",
//                "bank_details"=>"334561375",
//                "comm_in_per"=>"30",
//                "created_at" => now(),
//                "affiliate_code" => "087225",
//                "password" => "password1"],
//            ["username"=>"jbrodnax",
//                "fname"=>"Joseph",
//                "lname"=>"Brodnax",
//                "email"=>"joseph.brodnax@gmail.com",
//                "status"=>"Active",
////                "countrycode_id"=>'234',
//    //                "commission"=>"77",
//                "bank_details"=>"334561375",
//                "comm_in_per"=>"30",
//                "created_at" => now(),
//                "affiliate_code" => "269751",
//                "password" => Hash::make('password1')],
//            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('affiliates');
    }
}
