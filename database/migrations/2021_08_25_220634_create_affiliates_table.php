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
            $table->string('username');
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('status',['Pending','Active','Refused'])->default('Pending');
            //address
            $table->string('address', 255)->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->bigInteger('countrycode_id')->unsigned()->default('234')->nullable();
            $table->foreign('countrycode_id')->references('id')->on('country_codes');
            $table->string('commission')->default('Product Base')->nullable();
            $table->string('bank_details')->default('N/A')->nullable();
            $table->string('comm_in_per')->default('10')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('affiliates')->insert([

            ["username"=>"commodo",
                "fname"=>"Hector",
                "lname"=>"Beard",
                "email"=>"erat.Sed.nunc@dui.com",
                "status"=>"Active",
//                "countrycode_id"=>'116',
//                "commission"=>"11",
                "bank_details"=>"299489082",
                "comm_in_per"=>"60",
                "created_at" => now(),
                "password" => "password1"],

            ["username"=>"Donec.fringilla",
                "fname"=>"Hashim",
                "lname"=>"Dorsey",
                "email"=>"Donec.non.justo@semper.com",
                "status"=>"Active",
//                "countrycode_id"=>'180',
//                "commission"=>"91",
                "bank_details"=>"321826679",
                "comm_in_per"=>"63",
                "created_at" => now(),
                "password" => bcrypt("password1")],

            ["username"=>"hendrerit",
                "fname"=>"Chadwick",
                "lname"=>"Vance",
                "email"=>"non.feugiat@imperdietdictummagna.edu",
                "status"=>"Active",
//                "countrycode_id"=>'130',
//                "commission"=>"77",
                "bank_details"=>"334561375",
                "comm_in_per"=>"30",
                "created_at" => now(),
                "password" => "password1"],
            ["username"=>"jbrodnax",
                "fname"=>"Joseph",
                "lname"=>"Brodnax",
                "email"=>"joseph.brodnax@gmail.com",
                "status"=>"Active",
//                "countrycode_id"=>'234',
    //                "commission"=>"77",
                "bank_details"=>"334561375",
                "comm_in_per"=>"30",
                "created_at" => now(),
                "password" => Hash::make('password1')],
            ]);
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
