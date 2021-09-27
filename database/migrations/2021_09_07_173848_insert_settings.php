<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InsertSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
////        DB::table('settings')->delete();
//        DB::table('settings')->insert([
//            [
//                "key" => "paypal_payment_method",
//                "value" => 1,
//            ],
//            [
//                "key" => "paypal_client_id",
//                "value" => "AT1kf6r9-siw2EiFT-w0HAWgcBgdo0fvYe-xuQPVd0nzg7NiDCAETPFIhUuVu9tNRLZfs5MhU_0m9TSh"
//            ],
//            [
//                "key" => "paypal_secret_id",
//                "value" => "EGVe-MJ2WAzcc6Cl378v-hcXN-N2lR-zEqEUbLCYOLdIEjqWi1A3yEexz6ryivugQT_8Infus1mVXe1e"
//            ]
//        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
