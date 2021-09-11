<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('body')->nullable();
            $table->string('slug')->nullable();
            $table->string('keywords')->nullable();
            $table->string('image')->nullable();
            $table->enum('menu_placement',['Header','Footer'])->default('Header');
            $table->enum('status',['Active','Inactive'])->default('Active');
            $table->timestamps();
        });

        DB::table('posts')->insert([
            [
                "title" => "About Us",
                "body" => '                        <p><span style="font-size:12px"><span style="font-family:arial,helvetica,sans-serif">Arc-Angel Battery LLC is a battery buisness that prides itself on quality high performance Lithium Iron Phosphate Batteries (LiFePO4). We orginally started into this business because of a passion for batteries, we truly want the best for consumers!</span></span></p>

                        <p><span style="font-size:12px"><span style="font-family:arial,helvetica,sans-serif">Arc-Angel Batteries are rated with some of the highest Cold Cranking Amp&nbsp;ratings in the industry, but the story doesnt end there. Batteries should also provide long battery life, our batteries should last 10 years or more given proper care. To make sure you fully achieve 10 plus years of life we recommend using a LiFePO4 battery trickle charger.&nbsp;</span></span></p>

                        <p><span style="font-size:12px"><span style="font-family:arial,helvetica,sans-serif">Furthermore, Arc-Angel, batteries are some of the lightest weight batteries in the industry, they are in fact about half the weight of&nbsp;coventional (AGM or Lead Acid) batteries. In particular racers will appreciate the lightweight attributes of the battery, as will anyone who has ever installed a heavy conventional battery in a vehicle.</span></span></p>

                        <p><span style="font-size:12px"><span style="font-family:arial,helvetica,sans-serif">Superior techonolgy, long life, and affordable power what more could you ask for partner!&nbsp;</span></span></p>',
                "excerpt" => "Arc-Angel Battery LLC is a battery buisness that prides itself on(...)",
                "slug" => "About Us",
                "keywords" => "",
                "image" => "banners/aboutusbanner.jpg",
                "menu_placement" => "Header"

            ],
            [
                "title" => "Technical Comparisons",
                "body" => '<p>Universal fact for all battery chemistries is that a maintenance charger will help to extend life. If one of our batteries is purchased we recommend getting one made for LiFePO4 batteries to fully maxmize battery life. However other charger types can be used please see our FAQs section for more information.&nbsp;It should also be noted that&nbsp;if you live in cold climates where temperatures can go below freezing&nbsp;for long&nbsp;periods of time the life can be reduced. Using a battery blanket heater can help combat this and extend battery life.</p>

                            <p>General&nbsp;Flooded&nbsp;Lead&nbsp;Acid&nbsp;Battery: The Lead Acid Battery works by using lead and lead(IV) plates which are submerged in sulfuric acid. Lead(IV) oxidizes the lead plates and creates an electrical current. All currents are propelled by a Electromotive Force: This force is read in volts. Lead Acid Batteries have 2.1 nominal&nbsp;volts&nbsp;per cell and have 6 cells connected in series. This gives the battery a nominal&nbsp;voltage of 12.6&nbsp;volts and can be safely charged at 2.4 volts per cell giving a total float voltage of 14.4 volts.&nbsp;</p>

                            <p>However thats just the overly technical engineer in me but most important to not is this. These batteries run at the back of the pack in terms of Cold Cranking Amps (CCA), Reserve Capacity (RC), and Capacity (Ah).</p>

                            <p>Finally when comparing the three major types of batteries (Lead Acid, AGM, &amp; Lithium), the lead acid battery is also the only battery which requires maintenance due to off gasing: which is not environmentally friendly. This battery is also very heavy(often weighs more than twice as much as a lithium) .&nbsp; It is the heaviest type of battery of the big 3. The only&nbsp;true advantage of this type&nbsp;is low cost. These batteries also have the lowest expected battery life of 2-5 years depending on if a trickle charger is used.</p>

                            <p>General&nbsp;AGM Battery&nbsp;- The AGM battery is a Sealed Lead Acid Battery with less electrolyte than that of Flooded Lead Acid Style Battery. They have electrolyte solution impregnated in a moistened seperator rather than flooded in electrolyte solution like conventional lead acid batteries. AGM batteries allow for faster charging and instant high load current on demand. The individual cells have a fully charged voltage of 2.4 volts and with 6 cells in series have a float voltage of 14.4 nominal volts. These batteries&nbsp;off gas at a rate which is less than the flooded lead acid battery described above, but more than lithium iron phospahte(Arc-Angel Batteries) which do not off gas. This off gasing reduces&nbsp;battery life and potentially damages&nbsp;the enviroment. Furthermore, AGM batteries will last around 4&nbsp;to 7 years if they are taken care of by using a maintenance charger.&nbsp;</p>

                            <p>ARC-ANGEL BATTERY(LiFePO4) - Finally the pinnacle of modern technology: Lithium Iron Phosphate Batteries. The batteries work with a positive electrode made with a chemical compound called LiFePO4, and the negative electrode is made from carbon. In between these is an electrolyte solution. When charging the positive electrode gives up some of its lithium ion which attaches&nbsp;to the carbon or negative side. When discharging i.e providing power this process is reversed. In both cases electrons flow in the opposite direction to the ions around the outer circuit. However electrons do not flow through the elecrolyte.&nbsp;Each battery cell&nbsp;has a nominal voltage of around 3.2 volts, when 4 are connected in series you get 12.8 nominal volts. These can be charged safely at 3.65 volts per cell giving a maximum voltage of 14.6 Volts. Furthermore these batteries never off gas making them enviromentally friendly and maintenace free. This style of battery is&nbsp;also the lightest of the big 3 weighing in at around 50 percent (often less) of&nbsp;the AGM and Flooded Lead Acid types. Furthermore, these batteries provide even faster charging than AGM and also are equal or better in terms of Cold Cranking Amps, Reserve Capacity, and Capacity. Also it should be noted that LiFePO4 batteries last at around 10+ years assuming a maintenance charger is used.</p>

                            <p>Capacity Comparison - In general capacity of batteries is reduced when discharge currents are increased this is certainly true of flooded lead acid and AGM batteries, however LiFePO4 batteries are generally not affected by this <span style="background-color:transparent; color:rgb(51, 51, 51)">unless temerpatures drop below freezing. This is because LiFePO4 batteries have self-heating properties due to the nernst equation which predicts battery voltage rise with temperature. Voltage rising from self-heating counteracts the increased resistance and loss in capacity loss due to Peukerts Law(explained below). These properties&nbsp;have&nbsp;been noted in several studies in recent history for more information please see here:&nbsp;https://pdfs.semanticscholar.org/6756/ff155ea5477dc075a0ad79deac21bc587369.pdf. However as mentioned above </span>Peukerts Law is highly important when comparing Lead Acid and AGM batteries. This law is essentially used to show how capacity decreases with an increasing discharge current. Higher discharge currents&nbsp;are output by the battery when electrical loads are increased beyond what the manufacturer rated it for which is very common. The aforementioned capacity reduction is more severe when the Peukerts Exponent is higher. If the constant is given by the manufacturer it should be used. However the constant can also be calculated based upon the manufacturers listed specifications. These specifications can be entered into any peukerts exponent calculator you can find online I like using this one here:&nbsp;http://www.neon-john.net/EV/Peukert_calculations.xls&nbsp; The equation is listed below:</p>

                            <p><img alt="I t = C \left(\frac{C}{I H}\right)^{k-1}," src="https://wikimedia.org/api/rest_v1/media/math/render/svg/41ae9f23b0457f830665f842fc08441af41f81e5"></p>

                            <p><img alt="H" class="mwe-math-fallback-image-inline" src="https://wikimedia.org/api/rest_v1/media/math/render/svg/75a9edddcca2f782014371f75dca39d7e13a9c1b" style="border:0px; display:inline-block; height:2.176ex; vertical-align:-0.338ex; width:2.064ex">&nbsp;is the rated discharge time (in hours),</p>

                            <p><img alt="C" class="mwe-math-fallback-image-inline" src="https://wikimedia.org/api/rest_v1/media/math/render/svg/4fc55753007cd3c18576f7933f6f089196732029" style="border:0px; display:inline-block; height:2.176ex; vertical-align:-0.338ex; width:1.766ex">&nbsp;is the rated capacity at that discharge rate (in ampere hours),</p>

                            <p><img alt="I" class="mwe-math-fallback-image-inline" src="https://wikimedia.org/api/rest_v1/media/math/render/svg/535ea7fc4134a31cbe2251d9d3511374bc41be9f" style="border:0px; display:inline-block; height:2.176ex; vertical-align:-0.338ex; width:1.172ex">&nbsp;is the actual discharge current (in amperes),</p>

                            <p><img alt="k" class="mwe-math-fallback-image-inline" src="https://wikimedia.org/api/rest_v1/media/math/render/svg/c3c9a2c7b599b37105512c5d570edc034056dd40" style="border:0px; display:inline-block; height:2.176ex; vertical-align:-0.338ex; width:1.211ex">&nbsp;is the Peukert constant (dimensionless),</p>

                            <p><img alt="t" class="mwe-math-fallback-image-inline" src="https://wikimedia.org/api/rest_v1/media/math/render/svg/65658b7b223af9e1acc877d848888ecdb4466560" style="border:0px; display:inline-block; height:2.009ex; vertical-align:-0.338ex; width:0.84ex">&nbsp;is the actual time to discharge the battery (in hours).</p>

                            <p>So for an example lets take a group 35 battery from a leading manufacturer whom rates&nbsp;their battery at 44Ah with a C-Rate at 20 hours or C20. So based on this we can assume the manufacturers rated capacity was 44/20 = 2.2A. This is way too low for a car when all electrical loads are turned on. Now&nbsp;peukerts law comes in to play, we know the reserve capacity for this battery is 90 minutes and the discharge current to get this time was 25A. If we put this into the calculator mentioned above we get a peukerts exponent of 1.07&nbsp;So lets assume a 50A discharge rate and punch in the numbers to the above equation. We get an effective capacity of 35Ah. So what this means in practical terms is that the batteries you see in stores dont really have the capacity that it might appear when you consider real world applications. In my example a leading AGM rated at 44 Ah ended up at 35Ah while a Group 35 from Arc-Angel doesnt get affected by this as much and stays at approximatley 40Ah.</p>

                            <p>Charging Information - On a final note Lithium Iron Phosphate Batteries will work fine with a vehicles alternator as they generally output around 14.4V-14.6V which is in the acceptable range for charging,. However when wanting a top off charge when the car is not in use for simplicities sake we recommend a charger built for LiFePO4 batteries with a constant voltage/constant current algorithm. A lead acid charger can also be used, but there are some things to watch for please see our FAQs section for more information.</p>

                            <p>When comparing batteries Lithium is clearly the superior technology.&nbsp; Arc-Angel LiFePO4 Batteries stand tall above the rest on performance, what more could ask for in a battery! For racing applications the choice is clear the Arc-Angel Lithium Battery!</p>',
                "excerpt" => "Universal fact for all battery chemistries is that a maintenance charger(...)",
                "slug" => "Technical Comparisons",
                "keywords" => "",
                "image" => "banners/technicalcomparisonbanner.jpg",
                "menu_placement" => "Header"

            ],
            [
                "title" => "Return & Warranty Policy",
                "body" => '<p><span style="font-size:12px"><span style="font-family:arial,helvetica,sans-serif">Warranty: In the event of a defective or improperly functioning battery within the 10 year warranty period please send the battery back. As long as the battery falls under the listed terms and conditions then the battery will be fully protected by the 10 year warranty.&nbsp;The consumer will be responsible for return shipping, once received we will issue a refund for the shipping and send a new battery back. The new warranty will start on the date you receive it and will be prorated&nbsp; based on how long you had the previous battery. So if you had the battery for 1 years you would have a 9 year warranty left on the new battery.</span></span></p>
                        <p><span style="font-size:12px"><span style="font-family:arial,helvetica,sans-serif">Returns: In the case you wish to reutrn the battery for any reason then please inform us within 30 days and we will process the return as soon as possible. Please note that if the battery is damaged, modified, or not returned within the 30 day window the purchased battery is not eligilble for a return.</span></span></p>
                    </div>',
                "excerpt" => "Warranty: In the event of a defective or improperly(...)",
                "slug" => "Return & Warranty Policy",
                "keywords" => "",
                "image" => "banners/returnsbanner.jpg",
                "menu_placement" => "Footer"

            ],
            [
                "title" => "Terms & Conditions",
                "body" => "<p>• All shipping of return items and replacement items are the customer’s responsibility.&nbsp;</p>
<p>• Arc-Angel Battery's&nbsp;warranties are non-transferable. Warranties are meant for the original customer only. If the item is resold from the original purchaser to any other buyer (i.e. ebay, forums, in a vehicle, etc.) no warranty is available.</p>
<p>• Warranty is a guarantee against manufacturer defects and any abuse will void warranty see below for more detail.</p>
<p>• Shipping your battery back to Arc-Angel Battery&nbsp;without the proper paperwork may lead to the loss of your item and/or the denial of your warranty claim.</p>
<p>• Any batteries damaged when delivered back to Arc-Angel Battery,&nbsp;will not be replaced under the free replacement warranty program. It is the customer’s responsibility to package the item so that it will not be damaged during the shipping process.&nbsp;</p>
<p>• All warranty batteries must be returned to and received by Arc-Angel Battery. within the warranty period&nbsp;</p>
<p>• Once battery is received and tested to be bad, a replacement will be sent out.&nbsp; If customer needs replacement right away, customer will pay for replacement that is sent out and a credit will be issued once the first battery is received and found to be bad.&nbsp; If battery is good, then no credit will be issued and original battery will be sent back to customer. Customer shall be responsible for shipping on any warranted replacement battery and/or on the return shipping of a battery sent in for replacement, if that battery is tested to be good.</p>
<p>• Each item is only eligible for one free replacement.&nbsp;</p>
<p>• Once a customer’s product has been warranted the replacement item only holds the warranty until the expiration of the original item. The warranty does not start over on the replacement item.</p>
<p>• Arc-Angel Battery. reserves the right to deny any warranty claim.</p>",
                "excerpt" => "All shipping of return items and replacement items are the customer’s(...)",
                "slug" => "Terms & Conditions",
                "keywords" => "",
                "image" => "banners/termsbanner.jpg",
                "menu_placement" => "Footer"

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
        Schema::dropIfExists('posts');
    }
}
