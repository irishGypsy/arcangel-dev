<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->string('creator')->nullable();
            $table->string('post_date')->nullable();
            $table->string('host_site')->nullable();
            $table->string('length')->nullable();
            $table->string('url')->nullable();
            $table->string('thumbnail')->nullable();
            $table->text('file')->nullable();
            $table->text('embed_code')->nullable();
            $table->boolean('pinned')->default(0);
            $table->enum('status', ['Active','Inactive'])->default('Inactive');
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
        Schema::dropIfExists('videos');
    }
}
