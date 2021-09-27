<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->float('price_adjustment',8,2)->nullable();
            $table->enum('status',['Active','Inactive'])->default('Active')->nullable();
            $table->timestamps();
        });

        DB::table('packages')->insert([
           [
               'name' => 'Racing',
               'description' => 'Add a special doohickey for better battering under higher loads.',
               'price_adjustment' => +200.50,
               'status' => 'Active'
           ],
            [
                'name' => 'Weatherized',
                'description' => 'Adds gizmos to the battery for better protection in cold temps.',
                'price_adjustment' => -50,
                'status' => 'Active'
            ],
            [
                'name' => 'Astro',
                'description' => 'Adds the force to the cells of your battery to keep it running in the presence of a Sith Lord',
                'price_adjustment' => +500,
                'status' => 'Active'
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
        Schema::dropIfExists('packages');
    }
}
