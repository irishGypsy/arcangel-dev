<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatteryGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('battery_groups', function (Blueprint $table) {
            $table->id();
            $table->string('battery_group_name', 100);
            $table->string('battery_group_code', 45);
            $table->enum('status',['Active','Inactive'])->nullable()->default('Active');
            $table->timestamps();
        });

        DB::table('battery_groups')->insert([
            [ 'battery_group_name' => '47', 'battery_group_code' => '47' ],
            [ 'battery_group_name' => '51', 'battery_group_code' => '51' ],
            [ 'battery_group_name' => '34', 'battery_group_code' => '34' ],
            [ 'battery_group_name' => '24F', 'battery_group_code' => '24F' ],
            [ 'battery_group_name' => '35', 'battery_group_code' => '35' ],
            [ 'battery_group_name' => '48', 'battery_group_code' => '48' ],
            [ 'battery_group_name' => '49', 'battery_group_code' => '49' ],
            [ 'battery_group_name' => '40R', 'battery_group_code' => '40R' ],
            [ 'battery_group_name' => '94R', 'battery_group_code' => '94R' ],
            [ 'battery_group_name' => '20L', 'battery_group_code' => '20L' ],
            [ 'battery_group_name' => 'GC', 'battery_group_code' => 'GC' ],
            [ 'battery_group_name' => 'Charger 10A', 'battery_group_code' => '10A' ]

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attributes');
    }
}
