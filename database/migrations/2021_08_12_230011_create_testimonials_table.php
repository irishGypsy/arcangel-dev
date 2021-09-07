<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('slug')->nullable(); //slug
            $table->binary('hot')->nullable(); //hot
            $table->enum('status', ['Active','Inactive'])->default('Active'); //status
            $table->string('image')->nullable();
            $table->string('meta_title')->nullable(); //mtitle
            $table->string('meta_description')->nullable(); //mdesc
            $table->string('meta_keywords')->nullable(); //mkeyword
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testimonials');
    }
}
