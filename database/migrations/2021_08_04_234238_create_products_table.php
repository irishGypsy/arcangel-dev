
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
            $table->float('mrp',10,2)->nullable();
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
                "capacity_id"=>"3",
                "batterygroup_id"=>"2",
                "sku"=>"NZW45QBZ",
                "name"=>" 24v starter",
                "technical_specifications"=>"Lorem ipsum dolor sit amet, consectetuer adipiscing",
                "popular"=>"1",
                "countrycode_id"=>"107",
                "init_quantity"=>"6",
                "min_quantity"=>"7",
                "mrp"=>"8.53",
                "shipping"=>"56.54",
                "warranty"=>"risus. Morbi",
                "ship_type"=>"Small Parcel",
                "sales_applicable"=>"1"
            ],
            [
                "capacity_id"=>"9",
                "batterygroup_id"=>"3",
                "sku"=>"UVI23LBE",
                "name"=>" 48v starter ",
                "technical_specifications"=>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu",
                "popular"=>"0",
                "countrycode_id"=>"137",
                "init_quantity"=>"7",
                "min_quantity"=>"3",
                "mrp"=>"5.50",
                "shipping"=>"64.10",
                "warranty"=>"vulputate mauris",
                "ship_type"=>"Large Parcel",
                "sales_applicable"=>"0"
            ],
            [
                "capacity_id"=>"5",
                "batterygroup_id"=>"5",
                "sku"=>"WTB26WVU",
                "name"=>" 48v starter ",
                "technical_specifications"=>"Lorem ipsum dolor sit amet, consectetuer adipiscing",
                "popular"=>"0",
                "countrycode_id"=>"34",
                "init_quantity"=>"3",
                "min_quantity"=>"6",
                "mrp"=>"1.90",
                "shipping"=>"65.90",
                "warranty"=>"facilisis,
 magna",
                "ship_type"=>"Small Parcel",
                "sales_applicable"=>"0"
            ],
            [
                "capacity_id"=>"5",
                "batterygroup_id"=>"10",
                "sku"=>"NZY83AIC",
                "name"=>" 24v starter",
                "technical_specifications"=>"Lorem ipsum dolor sit amet, consectetuer",
                "popular"=>"1",
                "countrycode_id"=>"195",
                "init_quantity"=>"1",
                "min_quantity"=>"4",
                "mrp"=>"2.29",
                "shipping"=>"76.01",
                "warranty"=>"lobortis tellus justo",
                "ship_type"=>"Small Parcel",
                "sales_applicable"=>"1"
            ],
            [
                "capacity_id"=>"4",
                "batterygroup_id"=>"6",
                "sku"=>"MAL89PPQ",
                "name"=>" 48v starter ",
                "technical_specifications"=>"Lorem ipsum dolor sit amet, consectetuer adipiscing",
                "popular"=>"1",
                "countrycode_id"=>"132",
                "init_quantity"=>"4",
                "min_quantity"=>"9",
                "mrp"=>"3.41",
                "shipping"=>"92.44",
                "warranty"=>"orci lobortis augue",
                "ship_type"=>"Small Parcel",
                "sales_applicable"=>"0"
            ],
            [
                "capacity_id"=>"3",
                "batterygroup_id"=>"4",
                "sku"=>"YDH74ZIN",
                "name"=>"48v medium ",
                "technical_specifications"=>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing",
                "popular"=>"0",
                "countrycode_id"=>"13",
                "init_quantity"=>"5",
                "min_quantity"=>"2",
                "mrp"=>"3.65",
                "shipping"=>"2.26",
                "warranty"=>"amet,
 consectetuer adipiscing",
                "ship_type"=>"Small Parcel",
                "sales_applicable"=>"1"
            ],
            [
                "capacity_id"=>"5",
                "batterygroup_id"=>"2",
                "sku"=>"EEJ21QJJ",
                "name"=>" 24v double ",
                "technical_specifications"=>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus.",
                "popular"=>"1",
                "countrycode_id"=>"201",
                "init_quantity"=>"3",
                "min_quantity"=>"5",
                "mrp"=>"8.72",
                "shipping"=>"79.86",
                "warranty"=>"odio semper",
                "ship_type"=>"Large Parcel",
                "sales_applicable"=>"0"
            ],
            [
                "capacity_id"=>"10",
                "batterygroup_id"=>"7",
                "sku"=>"NDJ43XRU",
                "name"=>"48v medium ",
                "technical_specifications"=>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut",
                "popular"=>"0",
                "countrycode_id"=>"36",
                "init_quantity"=>"10",
                "min_quantity"=>"6",
                "mrp"=>"9.09",
                "shipping"=>"45.07",
                "warranty"=>"sem molestie sodales.",
                "ship_type"=>"Small Parcel",
                "sales_applicable"=>"0"
            ],
            [
                "capacity_id"=>"2",
                "batterygroup_id"=>"8",
                "sku"=>"HEM60UIR",
                "name"=>" 10v charger ",
                "technical_specifications"=>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit.",
                "popular"=>"0",
                "countrycode_id"=>"133",
                "init_quantity"=>"6",
                "min_quantity"=>"5",
                "mrp"=>"8.79",
                "shipping"=>"12.43",
                "warranty"=>"scelerisque neque. Nullam",
                "ship_type"=>"Large Parcel",
                "sales_applicable"=>"1"
            ]
        ]);

//        Schema::create('products', function (Blueprint $table) {
//            $table->bigIncrements('id');
//            $table->bigInteger('color_id')->nullable()->unsigned();
////            $table->foreign('color_id')->references('id')->on('colors');
//            $table->bigInteger('material_id')->nullable()->unsigned();
////            $table->foreign('material_id')->references('id')->on('materials');
//            $table->bigInteger('country_code_id')->nullable()->unsigned();
////            $table->foreign('country_code_id')->references('id')->on('country_codes');
//            $table->string('name');
//            $table->string('slug')->comment('product_url');
//            $table->integer('top_visited')->default(0)->nullable();
//            $table->string('search_keywords')->nullable();
//            $table->string('sku')->nullable();
//            $table->float('mrp',8,2)->nullable();
//            $table->float('shipping_charge',8,2)->nullable();
//            $table->float('discount',8,2)->nullable();
//            $table->text('description')->nullable();
//            $table->text('care_instructions')->nullable();
//            $table->string('warranty')->nullable();
//            $table->text('return_policy')->nullable();
//            $table->integer('length')->nullable();
//            $table->integer('width')->nullable();
//            $table->integer('height')->nullable();
//            $table->integer('weight')->nullable();
//            $table->integer('quantity')->nullable();
////            $table->integer('popular')->nullable();
//            $table->binary('is_fragile')->default(0);
//            $table->binary('has_plug')->default(0);
//            $table->string('power_plug')->nullable();
//            $table->binary('has_batteries')->default(0);
//            $table->binary('has_batteries_power')->default(0);
//            $table->binary('product_instructions')->default(0);
//            $table->integer('min_pro_quantity')->nullable()->default(null);
//            $table->float('bulk_price',8,0)->nullable();
//            $table->text('technical_specifications')->nullable();
//            $table->text('delivery_time')->nullable();
//            $table->text('extra_discount')->nullable();
//            $table->text('replacement_time')->nullable();
//            $table->enum('shipment_type',['small parcel','large parcel'])->default(null)->nullable();
//            $table->text('sale')->nullable();
//            $table->text('meta_name')->nullable();
//            $table->text('meta_description')->nullable();
//            $table->text('meta_keyword')->nullable();
//            $table->text('popular')->nullable();
//            $table->enum('status',['Active','Inactive'])->default('Active')->nullable();
//            $table->float('shipping_uk',8,0)->nullable();
//            $table->float('shipping_europe',8,0)->nullable();
//            $table->float('shipping_global',8,0)->nullable();
//            $table->string('model_number')->nullable();
//            $table->string('ebay_listing_id')->nullable();
//            $table->string('amazon_listing_id')->nullable();
//            $table->text('active_integrations')->nullable();
//            $table->unsignedBigInteger('brand_id')->nullable();
//            $table->foreign('brand_id')->references('id')->on('brands');
//            $table->timestamps();
//        });




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
