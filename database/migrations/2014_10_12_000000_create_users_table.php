<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            //contact info
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            //password
            $table->string('password');
            $table->timestamp('password_verified_at')->nullable();
            //address
            $table->string('address', 255)->nullable();
            $table->string('city')->nullable();
            $table->bigInteger('state_id')->unsigned()->nullable();
            $table->foreign('state_id')->references('id')->on('state_codes');
            $table->string('zip')->nullable();
            $table->bigInteger('countrycode_id')->unsigned()->nullable();
            $table->foreign('countrycode_id')->references('id')->on('country_codes');

            $table->boolean('is_affiliate')->default('0');
            $table->bigInteger('affiliate_id')->unsigned()->nullable();
            $table->foreign('affiliate_id')->references('id')->on('affiliates');

            //authentication and shop cart order token
            $table->rememberToken();
            //created at and modify at
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'first_name' => 'john',
                'last_name' => 'smith',
                'is_affiliate' => '1',
                'phone' => '832-832-0000',
                'email' => 'jsmith@gmail.com',
                'password' => Hash::make('password1'),
                'address' => '123 blue street',
                'city' => 'localville',
                'state_id'=> 43,
                'zip' => '77508',
                'countrycode_id' => 234
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Wolf',
                'is_affiliate' => '1',
                'phone' => '281-281-0000',
                'email' => 'jwolf@yahoo.com',
                'password' => Hash::make('password1'),
                'address' => '234 black st',
                'city' => 'anyville',
                'state_id'=> 43,
                'zip' => '77058',
                'countrycode_id' => 234
            ],
            [
                'first_name' => 'Pedro',
                'last_name' => 'Fili',
                'is_affiliate' => '0',
                'phone' => '876-876-0000',
                'email' => 'pfili@photonmail.com',
                'password' => Hash::make('password1'),
                'address' => '987 green blvd',
                'city' => 'Ghost Town',
                'state_id'=> 43,
                'zip' => '77058',
                'countrycode_id' => 234
            ],
            [
                'first_name' => 'Joseph',
                'last_name' => 'Brodnax',
                'is_affiliate' => '1',
                'phone' => '876-876-0000',
                'email' => 'joseph.brodnax@gmail.com',
                'password' => Hash::make('password1'),
                'address' => '987 green blvd',
                'city' => 'Ghost Town',
                'state_id'=> 43,
                'zip' => '77058',
                'countrycode_id' => 234
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
        Schema::dropIfExists('users');
    }
}
