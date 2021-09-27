<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InsertOrderDates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('orders')
            ->where("id", 1)
            ->update(["created_at" => "2020-12-13 23:00:43"]);

        DB::table('orders')
            ->where("id", 2)
            ->update(["created_at" => "2021-05-02 13:26:34"]);

        DB::table('orders')
            ->where("id", 3)
            ->update(["created_at" => "2021-08-01 03:29:51"]);

        DB::table('orders')
            ->where("id", 4)
            ->update(["created_at" => "2021-09-06 21:24:39"]);

        DB::table('orders')
            ->where("id", 5)
            ->update(["created_at" => "2020-11-23 19:50:37"]);

        DB::table('orders')
            ->where("id", 6)
            ->update(["created_at" => "2020-12-17 20:47:54"]);

        DB::table('orders')
            ->where("id", 7)
            ->update(["created_at" => "2021-07-20 15:14:09"]);

        DB::table('orders')
            ->where("id", 8)
            ->update(["created_at" => "2021-03-23 22:44:14"]);

        DB::table('orders')
            ->where("id", 9)
            ->update(["created_at" => "2021-09-14 16:46:56"]);

        DB::table('orders')
            ->where("id", 10)
            ->update(["created_at" => "2020-12-16 22:31:57"]);

        DB::table('orders')
            ->where("id", 11)
            ->update(["created_at" => "2021-07-13 00:07:11"]);

        DB::table('orders')
            ->where("id", 12)
            ->update(["created_at" => "2021-02-04 02:29:10"]);

        DB::table('orders')
            ->where("id", 13)
            ->update(["created_at" => "2020-11-22 23:26:45"]);

        DB::table('orders')
            ->where("id", 14)
            ->update(["created_at" => "2021-01-24 08:14:37"]);

        DB::table('orders')
            ->where("id", 15)
            ->update(["created_at" => "2021-01-01 09:34:44"]);

        DB::table('orders')
            ->where("id", 16)
            ->update(["created_at" => "2020-10-24 11:58:03"]);

        DB::table('orders')
            ->where("id", 17)
            ->update(["created_at" => "2021-09-23 21:39:13"]);

        DB::table('orders')
            ->where("id", 18)
            ->update(["created_at" => "2021-03-19 03:57:06"]);

        DB::table('orders')
            ->where("id", 19)
            ->update(["created_at" => "2021-09-22 03:48:59"]);

        DB::table('orders')
            ->where("id", 20)
            ->update(["created_at" => "2021-09-30 08:19:56"]);

        DB::table('orders')
            ->where("id", 21)
            ->update(["created_at" => "2021-08-07 03:15:40"]);

        DB::table('orders')
            ->where("id", 22)
            ->update(["created_at" => "2021-06-14 05:13:23"]);

        DB::table('orders')
            ->where("id", 23)
            ->update(["created_at" => "2021-01-28 22:34:52"]);

        DB::table('orders')
            ->where("id", 24)
            ->update(["created_at" => "2021-09-12 23:46:12"]);

        DB::table('orders')
            ->where("id", 25)
            ->update(["created_at" => "2020-11-08 03:47:40"]);

        DB::table('orders')
            ->where("id", 26)
            ->update(["created_at" => "2021-01-13 22:13:06"]);

        DB::table('orders')
            ->where("id", 27)
            ->update(["created_at" => "2020-11-26 02:38:37"]);

        DB::table('orders')
            ->where("id", 28)
            ->update(["created_at" => "2021-06-12 21:54:10"]);

        DB::table('orders')
            ->where("id", 29)
            ->update(["created_at" => "2021-09-11 12:12:03"]);

        DB::table('orders')
            ->where("id", 30)
            ->update(["created_at" => "2021-03-03 04:54:26"]);

        DB::table('orders')
            ->where("id", 31)
            ->update(["created_at" => "2020-10-25 07:45:23"]);

        DB::table('orders')
            ->where("id", 32)
            ->update(["created_at" => "2021-07-24 01:53:22"]);

        DB::table('orders')
            ->where("id", 33)
            ->update(["created_at" => "2021-04-14 11:11:54"]);

        DB::table('orders')
            ->where("id", 34)
            ->update(["created_at" => "2020-11-09 15:24:58"]);

        DB::table('orders')
            ->where("id", 35)
            ->update(["created_at" => "2021-05-04 05:25:39"]);

        DB::table('orders')
            ->where("id", 36)
            ->update(["created_at" => "2021-05-21 17:16:59"]);

        DB::table('orders')
            ->where("id", 37)
            ->update(["created_at" => "2020-11-13 00:10:57"]);

        DB::table('orders')
            ->where("id", 38)
            ->update(["created_at" => "2021-04-18 01:28:34"]);

        DB::table('orders')
            ->where("id", 39)
            ->update(["created_at" => "2020-09-26 01:54:46"]);

        DB::table('orders')
            ->where("id", 40)
            ->update(["created_at" => "2021-07-20 16:07:48"]);

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
