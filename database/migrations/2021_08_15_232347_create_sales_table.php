<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('productID')->unsigned()->nullable();
            $table->foreign('productID')->references('id')->on('products');
            $table->string('title');
            $table->text('description')->nullable();
            $table->float('discount',2,2)->nullable();
            $table->timestamps();
        });

        DB::table('sales')->insert([
            [
                "productID"=>5,
                "title"=>"Lorem ipsum dolor sit amet, consectetuer",
                "description"=>"Lorem ipsum dolor sit amet, consectetuer adipiscing",
                "discount"=>.21
            ],
            [
                "productID"=>4,
                "title"=>"Lorem ipsum dolor sit amet,",
                "description"=>"Lorem ipsum dolor",
                "discount"=>.23
            ],
            [
                "productID"=>2,
                "title"=>"Lorem ipsum dolor sit",
                "description"=>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur",
                "discount"=>.21
            ],

            [
                "productID"=>8,
                "title"=>"Lorem ipsum dolor sit amet, consectetuer",
                "description"=>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit.",
                "discount"=>.18
            ],
            [
                "productID"=>6,
                "title"=>"Lorem",
                "description"=>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit.",
                "discount"=>.10
            ],
            [
                "productID"=>3,
                "title"=>"Lorem",
                "description"=>"Lorem ipsum dolor",
                "discount"=>.25
            ],


        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
