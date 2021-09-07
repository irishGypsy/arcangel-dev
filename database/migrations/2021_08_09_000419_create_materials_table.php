<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('sort')->nullable();
            $table->string('material_code')->nullable();
            $table->enum('status',['Active','Inactive'])->default('Active');

            $table->timestamps();
        });

        DB::table('materials')->insert([
            [
                'name' => 'Protoculture',
                'material_code' => 'Robotech'
            ],
            [
                'name' => 'Unobtainium',
                'material_code' => 'Avatar'
            ],
            [
                'name' => 'Gold',
                'material_code' => 'Gold'
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
        Schema::dropIfExists('materials');
    }
}
