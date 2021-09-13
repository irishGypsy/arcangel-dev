
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {



        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('capacity_id')->index()->nullable()->unsigned();
            $table->foreign('capacity_id')->references('id')->on('capacities');
            $table->bigInteger('batterygroup_id')->index()->nullable()->unsigned();
            $table->foreign('batterygroup_id')->references('id')->on('battery_groups');
            $table->bigInteger('countrycode_id')->index()->nullable()->unsigned();
            $table->foreign('countrycode_id')->references('id')->on('country_codes');
            $table->string('sku')->nullable();
            $table->string('name');
            $table->unsignedInteger('init_quantity')->nullable();
            $table->unsignedInteger('min_quantity')->nullable();
            $table->boolean('popular')->default(0);
            $table->text('technical_specifications')->nullable();
            $table->float('price',10,2)->nullable();
            $table->float('shipping',8,2)->nullable();
            $table->string('warranty')->nullable();
            $table->enum('ship_type',['Small Parcel','Large Parcel'])->default('Small Parcel')->nullable();
            $table->boolean('sales_applicable')->nullable();

            $table->timestamps();
//            $table->string('slug')->nullable();
//            $table->text('description')->nullable();
//            $table->decimal('weight', 8, 2)->nullable();
//            $table->decimal('price', 8, 2)->nullable();
//            $table->boolean('status')->default(1);
//            $table->decimal('sale_price', 8, 2)->nullable();
        });

        DB::table('products')->insert([
            [
                "id" => "1",
                "capacity_id" => "13",
                "batterygroup_id" => "7",
                "countrycode_id" => "234",
                "sku" => "860000495271",
                "name" => "Arc-Angel Group 49 Starting Battery - Out of Stock",
                "init_quantity" => "0",
                "min_quantity" => "1",
                "popular" => "0",
                "technical_specifications" => "<p>Arc-Angel Battery&nbsp;lithium batteries delivers all you can ask for and more in a battery and&nbsp;has shown to provide:</p>\r\n\r\n<p>Less horsepower draw from the alternator due to efficient charging (5 times faster than lead),</p>\r\n\r\n<p>Lasts&nbsp;longer usually hits 10 years of life,</p>\r\n\r\n<p>Significant weight savings&nbsp;(around&nbsp;1/2&nbsp;the weight),</p>\r\n\r\n<p>Don&rsquo;t self-discharge as much, so if the battery is disconnected (no draw or via power disconnect switch), they can sit for over a year plus&nbsp;and still maintain voltage&nbsp;to start the vehicle.</p>\r\n\r\n<p>No off-gassing issues so they are more enviromentally friendly,</p>\r\n\r\n<p>Provide excellent Cold Cranking Amp ratings as compared to other battery chemistries,</p>\r\n\r\n<p>Specifications List:</p>\r\n\r\n<p>Part #: 6010008</p>\r\n\r\n<p>Type: LiFePO4</p>\r\n\r\n<p>Voltage: 12 V</p>\r\n\r\n<p>CCA: 1300A</p>\r\n\r\n<p>Group #: 49</p>\r\n\r\n<p>Dimensions: 352*174*190&nbsp;mm or 13.85*6.85*7.48&nbsp;in</p>\r\n\r\n<p>Weight: 19.73 lbs</p>\r\n'",
                "price" => "920",
                "shipping" => "0",
                "warranty" => "10 Year",
                "ship_type" => NULL,
                "sales_applicable" => "0",
            ],
            [
                "id" => "2",
                "capacity_id" => "4",
                "batterygroup_id" => "6",
                "countrycode_id" => "234",
                "name" => "arc-angel group 48 starting battery",
                "sku" => "860000495264",
                "price" => "840",
                "shipping" => "0",
                "warranty" => "10 Year",
                "init_quantity" => "0",
                "popular" => "0",
                "min_quantity" => "5",
                "technical_specifications" => "<p>Arc-Angel Battery&nbsp;lithium batteries delivers all you can ask for and more in a battery and&nbsp;has shown to provide:</p>\r\n\r\n<p>Less horsepower draw from the alternator due to efficient charging (5 times faster than lead),</p>\r\n\r\n<p>Lasts&nbsp;longer usually hits 10 years of life,</p>\r\n\r\n<p>Significant weight savings&nbsp;(around&nbsp;1/2&nbsp;the weight),</p>\r\n\r\n<p>Don&rsquo;t self-discharge as much, so if the battery is disconnected (no draw or via power disconnect switch), they can sit for over a year plus&nbsp;and still maintain voltage&nbsp;to start the vehicle.</p>\r\n\r\n<p>No off-gassing issues so they are more enviromentally friendly,</p>\r\n\r\n<p>Provide excellent Cold Cranking Amp ratings as compared to other battery chemistries,</p>\r\n\r\n<p>Specifications List:</p>\r\n\r\n<p>Part #: 457207</p>\r\n\r\n<p>Type: LiFePO4</p>\r\n\r\n<p>Voltage: 12 V</p>\r\n\r\n<p>CCA: 1000A</p>\r\n\r\n<p>Group #: 48</p>\r\n\r\n<p>Dimensions: 278*174*190&nbsp;mm or 10.94*6.85*7.48&nbsp;in</p>\r\n\r\n<p>Weight: 17.53 lbs</p>\r\n",
                "ship_type" => NULL,
                "sales_applicable" => "0",
            ],
            [
                "id" => "3",
                "capacity_id" => "6",
                "batterygroup_id" => "1",
                "countrycode_id" => "234",
                "name" => "Arc-Angel Group 47 Starting Battery - Out of Stock",
                "sku" => "860000495257",
                "price" => "820",
                "shipping" => "0",
                "warranty" => "10 Year",
                "init_quantity" => "0",
                "popular" => "1",
                "min_quantity" => "10",
                "technical_specifications" => "<p>Arc-Angel Battery&nbsp;lithium batteries delivers all you can ask for and more in a battery and&nbsp;has shown to provide:</p>\r\n\r\n<p>Less horsepower draw from the alternator due to efficient charging (5 times faster than lead),</p>\r\n\r\n<p>Lasts&nbsp;longer usually hits 10 years of life,</p>\r\n\r\n<p>Significant weight savings&nbsp;(around&nbsp;1/2&nbsp;the weight),</p>\r\n\r\n<p>Don&rsquo;t self-discharge as much, so if the battery is disconnected (no draw or via power disconnect switch), they can sit for over a year plus&nbsp;and still maintain voltage&nbsp;to start the vehicle.</p>\r\n\r\n<p>No off-gassing issues so they are more enviromentally friendly,</p>\r\n\r\n<p>Provide excellent Cold Cranking Amp ratings as compared to other battery chemistries,</p>\r\n\r\n<p>Specifications List:</p>\r\n\r\n<p>Part #: 354001</p>\r\n\r\n<p>Type: LiFePO4</p>\r\n\r\n<p>Voltage: 12 V</p>\r\n\r\n<p>CCA: 900A</p>\r\n\r\n<p>Group #: 47</p>\r\n\r\n<p>Dimensions: 240*174*90&nbsp;mm or 9.44*6.85*7.48&nbsp;in</p>\r\n\r\n<p>Weight: 15.99 lbs</p>\r\n",
                "ship_type" => NULL,
                "sales_applicable" => "0",
            ],
            [
                "id" => "4",
                "capacity_id" => "4",
                "batterygroup_id" => "4",
                "countrycode_id" => "234",
                "name" => "Arc-Angel Group 24F Starting Battery",
                "sku" => "860000495233",
                "price" => "420",
                "shipping" => "0",
                "warranty" => "10 Year",
                "init_quantity" => "6",
                "popular" => "1",
                "min_quantity" => "10",
                "technical_specifications" => "<p>Arc-Angel Battery&nbsp;lithium batteries delivers all you can ask for and more in a battery and&nbsp;has shown to provide:</p>\r\n\r\n<p>Less horsepower draw from the alternator due to efficient charging (5 times faster than lead),</p>\r\n\r\n<p>Lasts&nbsp;longer usually hits 10 years of life,</p>\r\n\r\n<p>Significant weight savings&nbsp;(around&nbsp;1/2&nbsp;the weight),</p>\r\n\r\n<p>Don&rsquo;t self-discharge as much, so if the battery is disconnected (no draw or via power disconnect switch), they can sit for over a year plus&nbsp;and still maintain voltage&nbsp;to start the vehicle.</p>\r\n\r\n<p>No off-gassing issues so they are more enviromentally friendly,</p>\r\n\r\n<p>Provide excellent Cold Cranking Amp ratings as compared to other battery chemistries,</p>\r\n\r\n<p>Specifications List:</p>\r\n\r\n<p>Part #: 458003</p>\r\n\r\n<p>Type: LiFePO4</p>\r\n\r\n<p>Applications: Starting, Deep-Cycle, Marine, and Powersports</p>\r\n\r\n<p>Voltage: 12 V</p>\r\n\r\n<p>CCA: 1000A</p>\r\n\r\n<p>Group #: 24F</p>\r\n\r\n<p>Dimensions: 260*172*224 mm or 10.23*6.77*8.81 in</p>\r\n\r\n<p>Weight: 15.87 lbs</p>\r\n",
                "ship_type" => NULL,
                "sales_applicable" => "0",
            ],
            [
                "id" => "5",
                "capacity_id" => "1",
                "batterygroup_id" => "2",
                "countrycode_id" => "234",
                "name" => "arc-angel group 51 starting battery",
                "sku" => "860000495240",
                "price" => "380",
                "shipping" => "0",
                "warranty" => "10 Year",
                "init_quantity" => "5",
                "popular" => "1",
                "min_quantity" => "0",
                "technical_specifications" => "<p>Arc-Angel Battery&nbsp;lithium batteries delivers all you can ask for and more in a battery and&nbsp;has shown to provide:</p>\r\n\r\n<p>Less horsepower draw from the alternator due to efficient charging (5 times faster than lead),</p>\r\n\r\n<p>Lasts&nbsp;longer usually hits 10 years of life,</p>\r\n\r\n<p>Significant weight savings&nbsp;(around&nbsp;1/2&nbsp;the weight),</p>\r\n\r\n<p>Don&rsquo;t self-discharge as much, so if the battery is disconnected (no draw or via power disconnect switch), they can sit for over a year plus&nbsp;and still maintain voltage&nbsp;to start the vehicle.</p>\r\n\r\n<p>No off-gassing issues so they are more enviromentally friendly,</p>\r\n\r\n<p>Provide excellent Cold Cranking Amp ratings as compared to other battery chemistries,</p>\r\n\r\n<p>Specifications List:</p>\r\n\r\n<p>Part #: 304604</p>\r\n\r\n<p>Type: LiFePO4</p>\r\n\r\n<p>Voltage: 12 V</p>\r\n\r\n<p>CCA: 550A</p>\r\n\r\n<p>Group #: 51</p>\r\n\r\n<p>Dimensions: 237*127*221&nbsp;mm or 9.33*5.00*8.70&nbsp;in</p>\r\n\r\n<p>Weight: 9.81 lbs</p>\r\n",
                "ship_type" => NULL,
                "sales_applicable" => "0",
            ],
            [
                "id" => "6",
                "capacity_id" => "6",
                "batterygroup_id" => "8",
                "countrycode_id" => "234",
                "name" => "Arc-Angel Group 40R Starting Battery",
                "sku" => "860000495202",
                "price" => "820",
                "shipping" => "0",
                "warranty" => "10 Year",
                "init_quantity" => "0",
                "popular" => "0",
                "min_quantity" => "3",
                "technical_specifications" => "<p>Arc-Angel Battery&nbsp;lithium batteries delivers all you can ask for and more in a battery and has shown to provide:</p>\r\n\r\n<p>Less horsepower draw from the alternator due to efficient charging (5 times faster than lead),</p>\r\n\r\n<p>Lasts longer usually hits 10 years of life,</p>\r\n\r\n<p>Significant weight savings&nbsp;(around 1/2&nbsp;the weight),</p>\r\n\r\n<p>Don&rsquo;t self-discharge as much, so if the battery is disconnected (no draw or via power disconnect switch), they can sit for over a year plus&nbsp;and still maintain voltage&nbsp;to start the vehicle.</p>\r\n\r\n<p>No off-gassing issues so they are more enviromentally friendly,</p>\r\n\r\n<p>Provide excellent Cold Cranking Amp ratings as compared to other battery chemistries,</p>\r\n\r\n<p>Specifications List:</p>\r\n\r\n<p>Part #:406506<br />\r\nBattery Type: LiFePO4<br />\r\nVoltage: 12 V<br />\r\nCCA: 900A<br />\r\nGroup #: 40R</p>\r\n\r\n<p>Dimensions: 278*174*175&nbsp;mm or 10.94*6.85*6.88 in</p>\r\n\r\n<p>Weight: 16.873 lbs</p>\r\n",
                "shipment_type" => "2",
                "sales_applicable" => "0",
            ],
            [
                "id" => "7",
                "capacity_id" => "3",
                "batterygroup_id" => "5",
                "countrycode_id" => "234",
                "name" => "arc-angel group 35 starting battery",
                "sku" => "860000495226",
                "price" => "416",
                "shipping" => "0",
                "warranty" => "10 Year",
                "init_quantity" => "0",
                "popular" => "1",
                "min_quantity" => "20",
                "technical_specifications" => "<p>Arc-Angel Battery&nbsp;lithium batteries delivers all you can ask for and more in a battery and&nbsp;has shown to provide:</p>\r\n\r\n<p>Less horsepower draw from the alternator due to efficient charging (5 times faster than lead),</p>\r\n\r\n<p>Lasts&nbsp;longer usually hits 10 years of life,</p>\r\n\r\n<p>Significant weight savings&nbsp;(around&nbsp;1/2&nbsp;the weight),</p>\r\n\r\n<p>Don&rsquo;t self-discharge as much, so if the battery is disconnected (no draw or via power disconnect switch), they can sit for over a year plus&nbsp;and still maintain voltage&nbsp;to start the vehicle.</p>\r\n\r\n<p>No off-gassing issues so they are more enviromentally friendly,</p>\r\n\r\n<p>Provide excellent Cold Cranking Amp ratings as compared to other battery chemistries,</p>\r\n\r\n<p>Specifications List:</p>\r\n\r\n<p>Part #: 406502</p>\r\n\r\n<p>Type: LiFePO4</p>\r\n\r\n<p>Voltage: 12 V</p>\r\n\r\n<p>CCA: 900A</p>\r\n\r\n<p>Group #: 35</p>\r\n\r\n<p>Dimensions: 238*172*221&nbsp;mm or 9.37*6.77*8.70&nbsp;in</p>\r\n\r\n<p>Weight: 15.99 lbs</p>\r\n",
                "ship_type" => NULL,
                "sales_applicable" => "0",
            ],
            [
                "id" => "8",
                "capacity_id" => "7",
                "batterygroup_id" => "9",
                "countrycode_id" => "234",
                "name" => "Arc-Angel Group 94R Starting Battery - Out of stock a new model should return in September/October",
                "sku" => "860000495219",
                "price" => "820",
                "shipping" => "0",
                "warranty" => "10 Year",
                "init_quantity" => "0",
                "popular" => "1",
                "min_quantity" => "2",
                "technical_specifications" => "<p>Arc-Angel Battery&nbsp;lithium batteries delivers all you can ask for and more in a battery and&nbsp;has shown to provide:</p>\r\n\r\n<p>Less horsepower draw from the alternator due to efficient charging (5 times faster than lead),</p>\r\n\r\n<p>Lasts&nbsp;longer usually hits 10 years of life,</p>\r\n\r\n<p>Significant weight savings&nbsp;(around&nbsp;1/2&nbsp;the weight),</p>\r\n\r\n<p>Don&rsquo;t self-discharge as much, so if the battery is disconnected (no draw or via power disconnect switch), they can sit for over a year plus&nbsp;and still maintain voltage&nbsp;to start the vehicle.</p>\r\n\r\n<p>No off-gassing issues so they are more enviromentally friendly,</p>\r\n\r\n<p>Provide excellent Cold Cranking Amp ratings as compared to other battery chemistries,</p>\r\n\r\n<p>Specifications List:</p>\r\n\r\n<p>Part #:508205<br />\r\nBattery Type: LiFePO4<br />\r\nVoltage: 12 V<br />\r\nCCA: 1200A<br />\r\nGroup #: 94R<br />\r\nDimensions: 315*174*190&nbsp;mm or 12.40*6.85*7.48 in</p>\r\n\r\n<p>Weight:&nbsp;23.8 lbs</p>\r\n",
                "shipment_type" => "2",
                "sales_applicable" => "0",
            ],
            [
                "id" => "9",
                "capacity_id" => "10",
                "batterygroup_id" => "11",
                "countrycode_id" => "234",
                "name" => "48V Arc-Angel Battery - See Description",
                "sku" => "NULL",
                "price" => "2600",
                "shipping" => "0",
                "warranty" => "4",
                "init_quantity" => "4",
                "popular" => "0",
                "min_quantity" => "4",
                "technical_specifications" => "<p>Special Order this product will have a 3-4 week lead time please email before ordering. Please note we use Nissan Leaf batteries for the cells. While this means the batteries are repurposed and not new this does not indicate lower quality in the slightest! In fact because these batteries are used in an EV they are higher quality than your typical lithium batteries. They will last right around 5-10 years depending on how you use them.&nbsp;</p>\r\n\r\n<p>Specifications:</p>\r\n\r\n<p>Continous Discharge Current: 324A</p>\r\n\r\n<p>Nominal Voltage: 48.1V (3.7V per cell)</p>\r\n\r\n<p>Peak Voltage: 54.6V (4.2V per cell)</p>\r\n\r\n<p>Case: ABS Plastic</p>\r\n\r\n<p>Terminals: SAE</p>\r\n\r\n<p>Capacity: 130Ah</p>\r\n\r\n<p>Estimated Reserve Capacity(25A discharge): 260 min</p>\r\n\r\n<p>Dimensions: 380*360*200mm</p>\r\n",
                "shipment_type" => "2",
                "sales_applicable" => "0",
            ],
            [
                "id" => "10",
                "capacity_id" => "10",
                "batterygroup_id" => "11",
                "countrycode_id" => "234",
                "name" => "48V Battery",
                "sku" => "NULL",
                "price" => "2160",
                "shipping" => "0",
                "warranty" => "4",
                "init_quantity" => "5",
                "popular" => "0",
                "min_quantity" => "2",
                "technical_specifications" => "",
                "shipment_type" => "2",
                "sales_applicable" => "1",
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
        Schema::dropIfExists('products');
    }
}
