<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatteryGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('battery_groups', function (Blueprint $table) {
//            $table->bigIncrements('id');
//            $table->string('material_name', 100);
//            $table->string('material_code', 45);
//            $table->enum('status',['Active','Inactive'])->nullable()->default('Active');
//            $table->timestamps();
//        });
//
//        DB::table('battery_groups')->insert([
//            [ 'material_name' => '47', 'material_code' => '47' ],
//            [ 'material_name' => '51', 'material_code' => '51' ],
//            [ 'material_name' => '34', 'material_code' => '34' ],
//            [ 'material_name' => '24F', 'material_code' => '24F' ],
//            [ 'material_name' => '35', 'material_code' => '35' ],
//            [ 'material_name' => '48', 'material_code' => '48' ],
//            [ 'material_name' => '49', 'material_code' => '49' ],
//            [ 'material_name' => '40R', 'material_code' => '40R' ],
//            [ 'material_name' => '94R', 'material_code' => '94R' ],
//            [ 'material_name' => '20L', 'material_code' => '20L' ],
//            [ 'material_name' => 'GC', 'material_code' => 'GC' ],
//            [ 'material_name' => 'Charger 10A', 'material_code' => '10A' ]
//
//        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('battery_groups');
    }
}
