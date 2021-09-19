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

            DB::table('affiliates')->insert([

            [
                "status"=>"Active",
                "bank_details"=>"299489082",
                "comm_in_per"=>"60",
                "created_at" => now(),
                "affiliate_code" => "905272",
            ],

            [
                "status"=>"Active",
                "bank_details"=>"321826679",
                "comm_in_per"=>"63",
                "created_at" => now(),
                "affiliate_code" => "776541",
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
        Schema::dropIfExists('affiliates');
    }
}
