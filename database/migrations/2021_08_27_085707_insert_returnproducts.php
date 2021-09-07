<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertReturnproducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('return_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->string('product_name')->nullable();
            $table->string('reason');
            $table->enum('status', ['Active','Inactive'])->default('Active');
            $table->timestamps();
        });

        DB::table('return_products')->insert([
            [
                'user_id' => '2',
//                'order_id' => '4',
                'product_name' => '48v medium battery',
                'reason' => 'defective',
                'status' => 'Active'
            ],
            [
                'user_id' => '1',
//                'order_id' => '5',
                'product_name' => '10v charger',
                'reason' => 'DOA',
                'status' => 'Active'
            ],
            [
                'user_id' => '3',
//                'order_id' => '3',
                'product_name' => '24v double cell',
                'reason' => 'Accidental purchase',
                'status' => 'Inactive'
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
        //
    }
}
