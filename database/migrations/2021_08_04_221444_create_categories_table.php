<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capacities', function (Blueprint $table) {
            $table->id();
            $table->string('capacity_name')->nullable();
            $table->string('capacity_code')->nullable();
            $table->enum('status',['Active','Inactive'])->nullable()->default('Active');
            $table->timestamps();
        });

        DB::table('capacities')->insert([
            [ 'capacity_name' => '30 Ah', 'capacity_code' => '#304604' ],
            [ 'capacity_name' => '45 Ah', 'capacity_code' => '#457207' ],
            [ 'capacity_name' => '40 Ah ', 'capacity_code' => '#406502' ],
            [ 'capacity_name' => '45 Ah ', 'capacity_code' => '#458003' ],
            [ 'capacity_name' => '60 Ah ', 'capacity_code' => '#6010008' ],
            [ 'capacity_name' => '40 Ah ', 'capacity_code' => '#406506' ],
            [ 'capacity_name' => '50 Ah ', 'capacity_code' => '#508205' ],
            [ 'capacity_name' => '35 Ah', 'capacity_code' => '#354001' ],
            [ 'capacity_name' => '16 Ah', 'capacity_code' => '16 Ah' ],
            [ 'capacity_name' => '130 AH', 'capacity_code' => '130 AH' ],
            [ 'capacity_name' => 'Not capacity - Charger 10A', 'capacity_code' => 'Charger 10A' ],
            [ 'capacity_name' => '80Ah', 'capacity_code' => '508205' ],
            [ 'capacity_name' => '100Ah', 'capacity_code' => '6010008' ]


        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
