<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnProductsTable extends Migration
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
            $table->string('reason');
            $table->enum('status', ['Paid','Pending','Denied'])->default('Pending');
            $table->timestamps();
        });

        DB::table('return_products')->insert([
            [
                "user_id"=>3,
                "order_id"=>4,
                "reason"=>"Lorem ipsum dolor sit amet consectetuer adipiscing elit. Curabitur",
                "status"=>"Pending"
            ],
            [
                "user_id"=>2,
                "order_id"=>8,
                "reason"=>"Lorem ipsum dolor sit amet consectetuer adipiscing",
                "status"=>"Pending"
            ],
            [
                "user_id"=>4,
                "order_id"=>6,
                "reason"=>"Lorem ipsum dolor sit amet consectetuer adipiscing elit.",
                "status"=>"Pending"
            ],
            [
                "user_id"=>1,
                "order_id"=>2,
                "reason"=>"Lorem ipsum dolor sit amet",
                "status"=>"Pending"
            ],
            [
                "user_id"=>3,
                "order_id"=>9,
                "reason"=>"Lorem",
                "status"=>"Paid"
            ],
            [
                "user_id"=>4,
                "order_id"=>6,
                "reason"=>"Lorem ipsum dolor sit amet consectetuer adipiscing",
                "status"=>"Pending"
            ],
            [
                "user_id"=>4,
                "order_id"=>1,
                "reason"=>"Lorem ipsum dolor sit amet consectetuer adipiscing",
                "status"=>"Pending"
            ],
            [
                "user_id"=>2,
                "order_id"=>9,
                "reason"=>"Lorem ipsum",
                "status"=>"Denied"
            ],
            [
                "user_id"=>2,
                "order_id"=>8,
                "reason"=>"Lorem ipsum dolor sit amet",
                "status"=>"Pending"
            ],
            [
                "user_id"=>3,
                "order_id"=>3,
                "reason"=>"Lorem ipsum dolor sit amet",
                "status"=>"Pending"
            ],
            [
                "user_id"=>3,
                "order_id"=>2,
                "reason"=>"Lorem ipsum dolor sit amet consectetuer adipiscing",
                "status"=>"Pending"
            ],
            [
                "user_id"=>2,
                "order_id"=>7,
                "reason"=>"Lorem",
                "status"=>"Denied"
            ],
            [
                "user_id"=>3,
                "order_id"=>9,
                "reason"=>"Lorem ipsum dolor sit amet consectetuer adipiscing",
                "status"=>"Pending"
            ],
            [
                "user_id"=>3,
                "order_id"=>6,
                "reason"=>"Lorem ipsum dolor sit amet",
                "status"=>"Denied"
            ],
            [
                "user_id"=>4,
                "order_id"=>1,
                "reason"=>"Lorem ipsum",
                "status"=>"Paid"
            ],
            [
                "user_id"=>4,
                "order_id"=>8,
                "reason"=>"Lorem",
                "status"=>"Pending"
            ],
            [
                "user_id"=>4,
                "order_id"=>4,
                "reason"=>"Lorem ipsum dolor sit amet consectetuer adipiscing elit.",
                "status"=>"Paid"
            ],
            [
                "user_id"=>1,
                "order_id"=>8,
                "reason"=>"Lorem",
                "status"=>"Denied"
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
        Schema::dropIfExists('return_products');
    }
}
