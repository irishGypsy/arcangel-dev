<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name');
            $table->string('email');
            $table->string('title');
            $table->text('description');
            $table->integer('rating');
            $table->enum('status', ['Active','Inactive'])->default('Inactive')->nullable();
            $table->timestamps();
        });

        DB::table('product_reviews')->insert([

           [
               "product_id"=>"6",
               "user_id"=>"3",
               "name"=>"Lewis Crane",
               "email"=>"Duis.gravida.Praesent@facilisis.org",
               "title"=>"taciti sociosqu ad",
               "description"=>"blandit enim consequat purus. Maecenas libero est, congue a, aliquet vel, vulputate eu, odio. Phasellus",
               "rating"=>"5",
               "status"=>"Inactive"
           ],

           [
               "product_id"=>"5",
               "user_id"=>"2",
               "name"=>"Kevin Coleman",
               "email"=>"penatibus.et@diamat.co.uk",
               "title"=>"Cras vulputate velit",
               "description"=>"Integer in magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet",
               "rating"=>"5",
               "status"=>"Active"
           ],

           [
               "product_id"=>"6",
               "user_id"=>"1",
               "name"=>"Merrill Curtis",
               "email"=>"pharetra.nibh.Aliquam@aliquetnecimperdiet.com",
               "title"=>"molestie pharetra",
               "description"=>"ipsum non arcu. Vivamus sit",
               "rating"=>"3",
               "status"=>"Inactive"
           ],

           [
               "product_id"=>"6",
               "user_id"=>"1",
               "name"=>"Ezekiel Herrera",
               "email"=>"lectus.ante@quam.com",
               "title"=>"massa rutrum",
               "description"=>"vestibulum nec, euismod in, dolor.",
               "rating"=>"5",
               "status"=>"Active"
           ],

           [
               "product_id"=>"5",
               "user_id"=>"1",
               "name"=>"Amal Hendrix",
               "email"=>"egestas.Duis.ac@pharetrafelis.co.uk",
               "title"=>"mus. Proin",
               "description"=>"amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo",
               "rating"=>"4",
               "status"=>"Inactive"
           ],

           [
               "product_id"=>"10",
               "user_id"=>"1",
               "name"=>"Dennis Daugherty",
               "email"=>"purus.gravida.sagittis@Ut.edu",
               "title"=>"nec ante. Maecenas mi felis,",
               "description"=>"enim. Etiam gravida molestie arcu.",
               "rating"=>"3",
               "status"=>"Active"
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
        Schema::dropIfExists('product_reviews');
    }
}
