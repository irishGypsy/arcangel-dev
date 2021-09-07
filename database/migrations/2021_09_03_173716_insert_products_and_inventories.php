<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InsertProductsAndInventories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('product_reviews')->delete();
        DB::table('products')->delete();

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
                "mrp" => "920",
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
                "mrp" => "840",
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
                "mrp" => "820",
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
                "mrp" => "420",
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
                "mrp" => "380",
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
                "mrp" => "820",
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
                "mrp" => "416",
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
                "mrp" => "820",
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
                "mrp" => "2600",
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
                "mrp" => "2160",
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

        DB::table('inventories')->insert([
            [
                "id" => "1",
                "productID" => "1",
                "integrations" => "Both",
                "ebay_listing_id"=> "292822722416",
                "amazon_listing_id"=> "457207",
            ],
            [
                "id" => "2",
                "productID" => "2",
                "integrations" => "Both",
                "ebay_listing_id"=> "293434921628",
                "amazon_listing_id"=> "354001",
            ],
            [
                "id" => "3",
                "productID" => "3",
                "integrations" => "Both",
                "ebay_listing_id"=> "292822719508",
                "amazon_listing_id"=> "458003",
            ],
            [
                "id" => "4",
                "productID" => "4",
                "integrations" => "Both",
                "ebay_listing_id"=> "292822724489",
                "amazon_listing_id"=> "304604",
            ],
            [
                "id" => "5",
                "productID" => "5",
                "integrations" => "Both",
                "ebay_listing_id"=> "292822720448",
                "amazon_listing_id"=> "406506",
            ],
            [
                "id" => "6",
                "productID" => "6",
                "integrations" => "Both",
                "ebay_listing_id"=> "292822718490",
                "amazon_listing_id"=> "406502",
            ],
            [
                "id" => "7",
                "productID" => "7",
                "integrations" => "Both",
                "ebay_listing_id"=> "293434959473",
                "amazon_listing_id"=> "508205",
            ],
            [
                "id" => "8",
                "productID" => "8",
                "integrations" => Null,
                "ebay_listing_id"=> Null,
                "amazon_listing_id"=> Null,
            ],
            [
                "id" => "9",
                "productID" => "9",
                "integrations" => Null,
                "ebay_listing_id"=> Null,
                "amazon_listing_id"=> Null,
            ],
            [
                "id" => "10",
                "productID" => "10",
                "integrations" => Null,
                "ebay_listing_id"=> Null,
                "amazon_listing_id"=> Null,
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
        //
    }
}
