<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referrals', function (Blueprint $table) {
            $table->id();
            $table->string('affiliate_name')->nullable();
            $table->bigInteger('Affiliate_id')->unsigned()->nullable();
            $table->foreign('affiliate_id')->on('affiliates')->references('id');
            $table->bigInteger('payment_id')->unsigned()->nullable();
            $table->foreign('payment_id')->on('affiliate_payments')->references('id');
            $table->float('total',10,2)->nullable();
            $table->float('commission',10,2)->nullable();
            $table->enum('status',['Unverified', 'Verified','Refused'])->default('Unverified')->nullable();
            $table->enum('paid', ['Paid','Unpaid'])->default('Unpaid')->nullable();
            $table->timestamps();
        });

        DB::table('referrals')->insert([
           [
               'affiliate_name' => 'John',
               'affiliate_id' => 1,
               'total' => '1121.01',
               'commission' => '322',
               'status' => 'Verified',
               'paid' => 'Paid',
               'created_at' => now()
               ] ,
            [
                'affiliate_name' => 'Jane',
                'affiliate_id' => 2,
                'total' => '435.44',
                'commission' => '122.10',
                'status' => 'Verified',
                'paid' => 'Paid',
                'created_at' => now()
            ] ,
            [
                'affiliate_name' => 'Jim',
                'affiliate_id' => 3,
                'total' => '3434.99',
                'commission' => '1200.01',
                'status' => 'Unverified',
                'paid' => 'Unpaid',
                'created_at' => now()
            ],
            [
                'affiliate_name' => 'John',
                'affiliate_id' => 1,
                'total' => '1541.01',
                'commission' => '322',
                'status' => 'Verified',
                'paid' => 'Unpaid',
                'created_at' => now()
            ] ,
            [
                'affiliate_name' => 'Jane',
                'affiliate_id' => 2,
                'total' => '1435.44',
                'commission' => '122.10',
                'status' => 'Verified',
                'paid' => 'Unpaid',
                'created_at' => now()
            ] ,
            [
                'affiliate_name' => 'Jim',
                'affiliate_id' => 4,
                'total' => '1234.99',
                'commission' => '200.01',
                'status' => 'Unverified',
                'paid' => 'Unpaid',
                'created_at' => now()
            ],
            [
                'affiliate_name' => 'John',
                'affiliate_id' => 4,
                'total' => '921.01',
                'commission' => '322',
                'status' => 'Verified',
                'paid' => 'Unpaid',
                'created_at' => now()
            ] ,
            [
                'affiliate_name' => 'Jane',
                'affiliate_id' => 4,
                'total' => '1435.44',
                'commission' => '122.10',
                'status' => 'Verified',
                'paid' => 'Unpaid',
                'created_at' => now()
            ] ,
            [
                'affiliate_name' => 'Jim',
                'affiliate_id' => 4,
                'total' => '634.99',
                'commission' => '120.01',
                'status' => 'Unverified',
                'paid' => 'Unpaid',
                'created_at' => now()
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
        Schema::dropIfExists('referrals');
    }
}
