<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        DB::table('settings')->insert([
            [
                'key'                       =>  'site_name',
                'value'                     =>  'Arc-Angel Batteries LLC',
            ],
            [
                'key'                       =>  'site_title',
                'value'                     =>  'Arc-Angel Batteries LLC',
            ],
            [
                'key'                       =>  'default_email_address',
                'value'                     =>  'admin@admin.com',
            ],
            [
                'key'                       =>  'currency_code',
                'value'                     =>  'USD',
            ],
            [
                'key'                       =>  'currency_symbol',
                'value'                     =>  '$',
            ],
            [
                'key'                       =>  'site_logo',
                'value'                     =>  '',
            ],
            [
                'key'                       =>  'site_favicon',
                'value'                     =>  '',
            ],
            [
                'key'                       =>  'footer_copyright_text',
                'value'                     =>  '',
            ],
            [
                'key'                       =>  'seo_meta_title',
                'value'                     =>  '',
            ],
            [
                'key'                       =>  'seo_meta_description',
                'value'                     =>  '',
            ],
            [
                'key'                       =>  'social_facebook',
                'value'                     =>  '',
            ],
            [
                'key'                       =>  'social_twitter',
                'value'                     =>  '',
            ],
            [
                'key'                       =>  'social_instagram',
                'value'                     =>  '',
            ],
            [
                'key'                       =>  'social_linkedin',
                'value'                     =>  '',
            ],
            [
                'key'                       =>  'google_analytics',
                'value'                     =>  '',
            ],
            [
                'key'                       =>  'facebook_pixels',
                'value'                     =>  '',
            ],
            [
                'key'                       =>  'stripe_payment_method',
                'value'                     =>  '',
            ],
            [
                'key'                       =>  'stripe_key',
                'value'                     =>  '',
            ],
            [
                'key'                       =>  'stripe_secret_key',
                'value'                     =>  '',
            ],
            [
                "key" => "paypal_payment_method",
                "value" => 1,
            ],
            [
                "key" => "paypal_client_id",
                "value" => "AT1kf6r9-siw2EiFT-w0HAWgcBgdo0fvYe-xuQPVd0nzg7NiDCAETPFIhUuVu9tNRLZfs5MhU_0m9TSh"
            ],
            [
                "key" => "paypal_secret_id",
                "value" => "EGVe-MJ2WAzcc6Cl378v-hcXN-N2lR-zEqEUbLCYOLdIEjqWi1A3yEexz6ryivugQT_8Infus1mVXe1e"
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
        Schema::dropIfExists('settings');
    }
}
