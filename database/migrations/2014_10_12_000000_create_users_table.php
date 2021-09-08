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
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->boolean('affiliate')->nullable()->default('0');
            //contact info
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            //password
            $table->string('password');
            //address
            $table->string('address', 255)->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('country')->nullable();
            //authentication and shop cart order token
            $table->rememberToken();
            //created at and modify at
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'first_name' => 'john',
                'last_name' => 'smith',
                'affiliate' => '1',
                'phone' => '832-832-0000',
                'email' => 'jsmith@gmail.com',
                'password' => Hash::make('password1'),
                'address' => '123 blue street',
                'city' => 'localville',
                'state'=> 'TX',
                'zip' => '77508',
                'country' => 'USA'
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Wolf',
                'affiliate' => '1',
                'phone' => '281-281-0000',
                'email' => 'jwolf@yahoo.com',
                'password' => Hash::make('password1'),
                'address' => '234 black st',
                'city' => 'anyville',
                'state'=> 'TX',
                'zip' => '77058',
                'country' => 'USA'
            ],
            [
                'first_name' => 'Pedro',
                'last_name' => 'Fili',
                'affiliate' => '0',
                'phone' => '876-876-0000',
                'email' => 'pfili@photonmail.com',
                'password' => Hash::make('password1'),
                'address' => '987 green blvd',
                'city' => 'Ghost Town',
                'state'=> 'TX',
                'zip' => '77058',
                'country' => 'USA'
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
