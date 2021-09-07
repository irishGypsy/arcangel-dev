<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->text('answer');
            $table->enum('status',['Active','Inactive'])->default('Active');
            $table->string('question');
            $table->timestamps();
        });

        DB::table('faqs')->insert([
        [ 'answer' => 'Cold Cranking Amps are the total amount of amps that a battery can deliver at &ndash;18&deg;C (0&deg;F) for 30 seconds without dropping below 7.2 volts. Typical readings for a car range from 350 to 600A and higher for trucks.','status' => 'Active', 'question' =>  'What are Cold Cranking Amps?'],

[ 'answer' => 'Due to issues with cell matching wiring in series beyond 24V is not recommended. However recently real world testing from our valued customers have indicated that they work fine in excess of 24V. So we leave that up to the customer however should you choose to do it your warranty will be reduced to 2 years. Finally any connection in parallel is completely fine and acceptable to do.', 'status' => 'Active', 'question' => 'Can the batteries be wired in Series or Parallel?'],

[ 'answer' => 'Your cars alternator is fine for charging. However for maintaining a battery when not in use,we recommend a charger designed for LiFePO4 charging just for simplicity and peace of mind. You can get away with a standard Lead Acid Charger, but you have to be careful. If you wish to go this route please make sure it does not charge above 14.6V, does not have an automatic equalization mode, and ideally does not trickle charge when finished charging. Most lead acid chargers charge on whats called a CC/CV algorithm also called Constant Current/Constant Voltage. This is the same algorithm for LiFePO4 charging, so as long as the above things check out a standard Lead Acid Charger will work. Chargers with a CC/CV algorithm start in Constant Current mode which means they increase voltage over time to maintain a constant current. When the voltage hits the upper cell limit it then switches to Constant Voltage mode where maximum voltage is held and the current tapers off until it hits a low current value where the charger then terminates the charge. The graph below demonstrates the CC/CV charging algorithm(minus the proper charge termination):<br><img alt="Image result for CC/CV" src="https://www.researchgate.net/profile/K_Kassmi/publication/263057480/figure/fig1/AS:314189659820032@1451920060592/Control-stages-CC-CV-of-process-charge-discharge.png" />', 'status' => 'Active', 'question' => 'Do LiFePO4 Batteries Require a Special Charger?'],

[ 'answer' => 'Yes we can special order different amp hour ratings that we do not currently have. Please shoot us an email if needing a different specification than our current offerings.', 'status' => 'Active', 'question' => 'Can you get batteries of Different Capacities not Listed Here?'],

[ 'answer' => 'Yes please email us if needing a different size than currently listed.', 'status' => 'Active', 'question' => 'Do you offer any other Group Size than What you Currently List?'],

[ 'answer' => 'No it just means we dont have the data on your vehicle yet. If you wish to have your vehicle added and inquire on whether we may have a battery that fits please request we add your vehicle to our database.', 'status' => 'Active', 'question' => 'Why is my vehicle not Listed in the Battery Finder does this mean you dont have a battery for me?'],

[ 'answer' => 'The answer is unequivocally no the LiFePO4 battery chemistry is safer then the older Lithium Ion battery chemistries. For more information please see here:https://en.wikipedia.org/wiki/Lithium_iron_phosphate_battery#Safety.', 'status' => 'Active', 'question' => 'Are LiFePO4 Style Batteries Dangerous?'],

[ 'answer' => 'Yes all Arc-Angel Batteries have a BMS or Battery Management System which is designed to protect the battery from short-circuits, and provides charge protection, discharge protection, and voltage balancing. Our batteries for those who wish to know are top-balanced meaning the BMS balances at the top voltage range for LiFePO4 aka 3.65V instead of at the bottom.', 'status' => 'Active', 'question' => 'Do these batteries have electronics to protect them?']]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faqs');
    }
}
