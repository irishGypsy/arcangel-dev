<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->text('image')->nullable();
            $table->timestamp('entry_date')->useCurrent();
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->text('description')->nullable();
            $table->text('url')->nullable();
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::table('banners')->insert([
            [
                "title" => "Superior Technology to Rule the Drag Strip",
                "image" => "banners/9ykcsUzwsy3NIVQoJuo8ZCGrD.jpg",
                "status" => "active",
                "description" => "50 Percent Lighter than The Competition"
            ],
            [
                "title" => "LiFePO4 Technology the Leading Edge",
                "image" => "banners/BIC0ILK5XM7a76fFc3madVGQj.jpg",
                "status" => "active",
                "description" => "A racers dream weight savings at a fraction of the cost"
            ],
            [
                "title" => "Engineered to Beat the Competition",
                "image" => "banners/QhaS694cQlYJcqeZxBkqKZLIt.jpg",
                "status" => "active",
                "description" => "Arc-Angel Batteries Lithium not Expensium"
            ],
            [
                "title" => "",
                "image" => "banners/ntXvLJ5NSXw1QcyV4smWgvrpU.jpg",
                "status" => "active",
                "description" => ""
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
        Schema::dropIfExists('banner');
    }
}
