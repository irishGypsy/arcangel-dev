<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStateCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state_codes', function (Blueprint $table) {
            $table->id();
            $table->string('abbreviation');
            $table->string('state');
            $table->timestamps();
        });

        DB::table('state_codes')->insert([
            [
                "state" => "Alabama",
                "abbreviation" => "AL"
            ],
            [
                "state" => "Alaska",
                "abbreviation" => "AK"
            ],
            [
                "state" => "Arizona",
                "abbreviation" => "AZ"
            ],
            [
                "state" => "Arkansas",
                "abbreviation" => "AR"
            ],
            [
                "state" => "California",
                "abbreviation" => "CA"
            ],
            [
                "state" => "Colorado",
                "abbreviation" => "CO"
            ],
            [
                "state" => "Connecticut",
                "abbreviation" => "CT"
            ],
            [
                "state" => "Delaware",
                "abbreviation" => "DE"
            ],
            [
                "state" =>  "District of Columbia",
                "abbreviation" =>  "DC"
            ],
            [
                "state" => "Florida",
                "abbreviation" => "FL"
            ],
            [
                "state" => "Georgia",
                "abbreviation" => "GA"
            ],
            [
                "state" => "Hawaii",
                "abbreviation" => "HI"
            ],
            [
                "state" => "Idaho",
                "abbreviation" => "ID"
            ],
            [
                "state" => "Illinois",
                "abbreviation" => "IL"
            ],
            [
                "state" => "Indiana",
                "abbreviation" => "IN"
            ],
            [
                "state" => "Iowa",
                "abbreviation" => "IA"
            ],
            [
                "state" => "Kansas",
                "abbreviation" => "KS"
            ],
            [
                "state" => "Kentucky",
                "abbreviation" => "KY"
            ],
            [
                "state" => "Louisiana",
                "abbreviation" => "LA"
            ],
            [
                "state" => "Maine",
                "abbreviation" => "ME"
            ],
            [
                "state" => "Maryland",
                "abbreviation" => "MD"
            ],
            [
                "state" => "Massachusetts",
                "abbreviation" => "MA"
            ],
            [
                "state" => "Michigan",
                "abbreviation" => "MI"
            ],
            [
                "state" => "Minnesota",
                "abbreviation" => "MN"
            ],
            [
                "state" => "Mississippi",
                "abbreviation" => "MS"
            ],
            [
                "state" => "Missouri",
                "abbreviation" => "MO"
            ],
            [
                "state" => "Montana",
                "abbreviation" => "MT"
            ],
            [
                "state" => "Nebraska",
                "abbreviation" => "NE"
            ],
            [
                "state" => "Nevada",
                "abbreviation" => "NV"
            ],
            [
                "state" =>  "New Hampshire",
                "abbreviation" =>  "NH"
            ],
            [
                "state" =>  "New Jersey",
                "abbreviation" =>  "NJ"
            ],
            [
                "state" =>  "New Mexico",
                "abbreviation" =>  "NM"
            ],
            [
                "state" =>  "New York",
                "abbreviation" =>  "NY"
            ],
            [
                "state" =>  "North Carolina",
                "abbreviation" =>  "NC"
            ],
            [
                "state" =>  "North Dakota",
                "abbreviation" =>  "ND"
            ],
            [
                "state" => "Ohio",
                "abbreviation" => "OH"
            ],
            [
                "state" => "Oklahoma",
                "abbreviation" => "OK"
            ],
            [
                "state" => "Oregon",
                "abbreviation" => "OR"
            ],
            [
                "state" => "Pennsylvania",
                "abbreviation" => "PA"
            ],
            [
                "state" =>  "Rhode Island",
                "abbreviation" =>  "RI"
            ],
            [
                "state" =>  "South Carolina",
                "abbreviation" =>  "SC"
            ],
            [
                "state" =>  "South Dakota",
                "abbreviation" =>  "SD"
            ],
            [
                "state" => "Tennessee",
                "abbreviation" => "TN"
            ],
            [
                "state" => "Texas",
                "abbreviation" => "TX"
            ],
            [
                "state" => "Utah",
                "abbreviation" => "UT"
            ],
            [
                "state" => "Vermont",
                "abbreviation" => "VT"
            ],
            [
                "state" => "Virginia",
                "abbreviation" => "VA"
            ],
            [
                "state" => "Washington",
                "abbreviation" => "WA"
            ],
            [
                "state" =>  "West Virginia",
                "abbreviation" =>  "WV"
            ],
            [
                "state" => "Wisconsin",
                "abbreviation" => "WI"
            ],
            [
                "state" => "Wyoming",
                "abbreviation" => "WY"
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
        Schema::dropIfExists('state_codes');
    }
}
