<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class AddUsersAndProductsAndOrdersForTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        DB::table('users')->insert([
//            [
//                'first_name' => 'john',
//                'last_name' => 'smith',
//                'phone' => '832-832-0000',
//                'email' => 'jsmith@gmail.com',
//                'password' => Hash::make('password1'),
//                'address' => '123 blue street',
//                'city' => 'localville',
//                'state'=> 'TX',
//                'zip' => '77508',
//                'country' => 'USA'
//            ],
//            [
//                'first_name' => 'Jane',
//                'last_name' => 'Wolf',
//                'phone' => '281-281-0000',
//                'email' => 'jwolf@yahoo.com',
//                'password' => Hash::make('password1'),
//                'address' => '234 black st',
//                'city' => 'anyville',
//                'state'=> 'TX',
//                'zip' => '77058',
//                'country' => 'USA'
//            ],
//            [
//                'first_name' => 'Pedro',
//                'last_name' => 'Fili',
//                'phone' => '876-876-0000',
//                'email' => 'pfili@photonmail.com',
//                'password' => Hash::make('password1'),
//                'address' => '987 green blvd',
//                'city' => 'Ghost Town',
//                'state'=> 'TX',
//                'zip' => '77058',
//                'country' => 'USA'
//            ]
//        ]);
////
//        DB::table('products')->insert([
//            [
//                'color_id' => '4',
//                'material_id' => '5',
//                'country_code_id' => '234',
//                'name' => 'widget',
//                'slug' => 'widget',
//                ],
//            [
//                'color_id' => '5',
//                'material_id' => '6',
//                'country_code_id' => '234',
//                'name' => 'gizmo',
//                'slug' => 'gizmo',
//            ],
//            [
//                'color_id' => '5',
//                'material_id' => '4',
//                'country_code_id' => '234',
//                'name' => 'sprocket',
//                'slug' => 'sprocket',
//            ],
//
//        ]);
//
//        DB::table('orders')->insert([
//            [
//                'order_number' => 'werr2342',
//                'user_id' => '10',
//                'grand_total' => '455.12',
//                'item_count' => '2',
//
//            ],
//            [
//                'order_number' => '234werer',
//                'user_id' => '11',
//                'grand_total' => '3241.45',
//                'item_count' => '6',
//
//            ],
//            [
//                'order_number' => 'wer123234',
//                'user_id' => '12',
//                'grand_total' => '234',
//                'item_count' => '1',
//
//            ]
//
//        ]);

//        DB::table('order_items')->insert([
//            [
//                'order_id' => '4',
//                'product_id' => '8',
//                'quantity' => '1',
//                'price' => '223'
//
//            ],
//            [
//                'order_id' => '4',
//                'product_id' => '7',
//                'quantity' => '2',
//                'price' => '223'
//
//            ],
//            [
//                'order_id' => '5',
//                'product_id' => '7',
//                'quantity' => '3',
//                'price' => '223'
//
//            ],
//            [
//                'order_id' => '6',
//                'product_id' => '8',
//                'quantity' => '1',
//                'price' => '223'
//
//            ]
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
//        Schema::table('users', function($table)
//        {
//            $table->truncate();
//        });
    }
}
