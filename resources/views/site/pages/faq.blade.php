<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') - {{ config('app.name') }}</title>
    @include('site.partials.styles')
    @include('site.partials.scripts')

    <script>
        $(window).scroll(function () {
            if ($(window).scrollTop() > 200) {
                $(".headpanel").addClass('sticky');
            } else {
                $(".headpanel").removeClass('sticky');

            }

        });

    </script>
    {{--    @include('site.partials.header')--}}

</head>
<body style="background-color:#333333">
@include('site.partials.nav')


<div id="wrapper" style="background-color: white;">
        {

        <script type="text/javascript">
            $(document).ready(function(){
                $("#searchform1f").validate();
            });

            $('.aimgactive').on('click',function() {
                alert('hi');
                $(".imgactive").removeClass("active");
                // $(".tab").addClass("active"); // instead of this do the below
                $(this).addClass("active");
            });
            function chagecurrency(currency){

                window.location="https://www.arcangelbattery.com/currency-convert/"+currency;
            }

        </script>


        <!-- content div start -->
        <div class="content_area" style="background-color: white;">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <div class="about_cntnt">
                            <h1>Frequently Asked Questions</h1>

                            <div class="panel-group" id="accordion">





                                <div class="faaq_botth">


                                    <button class="collapsible">Do These Batteries Have Electronics To Protect Them?</button>
                                    <div class="content">



                                        <p><span style="font-size:12px"><span style="font-family:arial,helvetica,sans-serif">Yes all Arc-Angel Batteries have a BMS or Battery Management System&nbsp;<span style="background-color:transparent; color:rgb(35, 31, 32)">which </span>is designed to protect<span style="background-color:transparent; color:rgb(35, 31, 32)"> the battery from short-circuits, and provides charge protection, discharge protection, and voltage balancing. Our batteries for those who wish to know are top-balanced meaning the BMS balances at the top voltage range for LiFePO4 aka 3.65V instead of at the bottom.</span></span></span></p>




                                    </div>

                                </div>




                                <div class="faaq_botth">


                                    <button class="collapsible">Are LiFePO4 Style Batteries Dangerous?</button>
                                    <div class="content">



                                        <p><span style="font-size:12px"><span style="font-family:arial,helvetica,sans-serif">The answer is unequivacally no the LiFePO4 battery chemistry is safer&nbsp;then the older Lithium Ion battery chemistries. For more information please see here:&nbsp;https://en.wikipedia.org/wiki/Lithium_iron_phosphate_battery#Safety.</span></span></p>




                                    </div>

                                </div>




                                <div class="faaq_botth">


                                    <button class="collapsible">Why Is My Vehicle Not Listed In The Battery Finder Does This Mean You Dont Have A Battery For Me?</button>
                                    <div class="content">



                                        <p><span style="font-size:12px"><span style="font-family:arial,helvetica,sans-serif">No it just means we dont have the data on your vehicle yet. If you wish to have your vehicle added and inquire on whether we may have a battery that fits please request we add your vehicle to our database.</span></span></p>




                                    </div>

                                </div>




                                <div class="faaq_botth">


                                    <button class="collapsible">Do You Offer Any Other Group Size Than What You Currently List?</button>
                                    <div class="content">



                                        <p><span style="font-size:12px"><span style="font-family:arial,helvetica,sans-serif">Yes please email us if needing a different size than currently listed.</span></span></p>




                                    </div>

                                </div>




                                <div class="faaq_botth">


                                    <button class="collapsible">Can You Get Batteries Of Different Capacities Not Listed Here?</button>
                                    <div class="content">



                                        <p><span style="font-size:12px"><span style="font-family:arial,helvetica,sans-serif">Yes we can special order different amp hour ratings that we do not currently have. Please shoot us an email if needing a different specfication than our current offerings.</span></span></p>




                                    </div>

                                </div>




                                <div class="faaq_botth">


                                    <button class="collapsible">Do LiFePO4 Batteries Require A Special Charger?</button>
                                    <div class="content">



                                        <p><span style="font-size:12px"><span style="font-family:arial,helvetica,sans-serif">Your cars alternator&nbsp;is fine for charging. However for maintaining a battery when not in use,&nbsp;we recommend a charger designed for LiFePO4 charging just for simplicity and peace of mind. You&nbsp;can get away with a standard Lead Acid Charger, but you have to be careful. If you wish to go this route please make sure it does not charge above 14.6V, does not have an automatic equalization mode, and ideally does not trickle charge when finished charging. Most lead acid chargers charge on whats called a CC/CV algorithm also called Constant Current/Constant Voltage. This is the same algorithm for LiFePO4 charging, so as long as the above things check out a standard Lead Acid Charger will work. Chargers with a CC/CV alogirthm start in Constant Current mode which means they increase&nbsp;voltage over time&nbsp;to maintain a constant current. When the voltage hits the upper cell limit it then switches to Constant Voltage mode where maximum voltage is held and the current tapers off until it hits a low current value where the charger then terminates the charge. The graph below&nbsp;demonstrates the CC/CV charging algorithm(minus the proper charge termination):</span></span></p>

                                        <p><img alt="Image result for CC/CV" src="https://www.researchgate.net/profile/K_Kassmi/publication/263057480/figure/fig1/AS:314189659820032@1451920060592/Control-stages-CC-CV-of-process-charge-discharge.png"></p>




                                    </div>

                                </div>




                                <div class="faaq_botth">


                                    <button class="collapsible">Can The Batteries Be Wired In Series Or Parallel?</button>
                                    <div class="content">



                                        <p><span style="font-size:12px"><span style="font-family:arial,helvetica,sans-serif">Due to&nbsp;issues&nbsp;with cell matching wiring in series beyond 24V is not recommened. However recently&nbsp;real world testing from our valued customers have indicated that they work fine in excess of 24V. So we leave that up to the customer however should you choose to do it your warranty will be reduced to 2 years. Finally&nbsp;any conection in parallel is completley fine and acceptable to do.</span></span></p>




                                    </div>

                                </div>




                                <div class="faaq_botth">


                                    <button class="collapsible">What Is Reserve Capacity And How Does It Differ From Capacity?</button>
                                    <div class="content">



                                        <p><span style="font-size:12px"><span style="font-family:arial,helvetica,sans-serif">Reserve Capacity is the amount of time listed in minutes that a battery can sustain under a 25A discahrge without dropping below 10.5V. Capacity on the other hand is the total amount of energy stored in the battery listed in units of Ah also known as Amp-Hours. Our batteries Capacity are rated at the standard C20 rate meaning if you have a 60 Ah battery a discharge current of 1200 A will discharge the battery completley in 3 minutes. For reference on this please see the MIT reference here:&nbsp;<span style="background-color:transparent; color:rgb(107, 107, 107)">https://web.mit.edu/evt/summary_battery_specifications.pdf</span></span></span></p>




                                    </div>

                                </div>




                                <div class="faaq_botth">


                                    <button class="collapsible">What Are Cold Cranking Amps?</button>
                                    <div class="content">



                                        <p><span style="background-color:transparent; color:rgb(51, 51, 51); font-family:arial,helvetica,sans-serif; font-size:12px">Cold Cranking Amps are the total amount of amps that a battery can deliver at –18°C (0°F) for 30 seconds without dropping below 7.2 volts. Typical readings for a car range from 350 to 600A and higher for trucks.&nbsp;</span></p>




                                    </div>

                                </div>




                            </div><!-- /.panel-group -->

                        </div>

                    </div>


                </div>
            </div>

        </div><!-- content div end -->



        <script>
            var coll = document.getElementsByClassName("collapsible");
            var i;

            for (i = 0; i < coll.length; i++) {
                coll[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var content = this.nextElementSibling;
                    if (content.style.maxHeight){
                        content.style.maxHeight = null;
                    } else {
                        content.style.maxHeight = content.scrollHeight + "px";
                    }
                });
            }
        </script><script>
            $(document).ready(function (e) {

                $("#showLogin, #showLogin1, #showLogin2, #showLogin3, #showLogin4").click(function () {
                    $('#register_pop').hide();
                    $('#login_pop').show();
                    $('#forgot_pop').hide();
                    $('#regisSuccClose1').hide();
                });


                $("#showRegister, #showRegister1, #showRegister2").click(function () {
                    $('#register_pop').show();
                    $('#login_pop').hide();
                    $('#forgot_pop').hide();
                });

                $("#closeprductenquirydiv").click(function () {
                    $('#prductenquirydiv').hide();
                });
                $("#prductenquiry").click(function () {
                    $('#prductenquirydiv').show();
                });
                $("#forgot_pass").click(function () {
                    $('#register_pop').hide();
                    $('#login_pop').hide();
                    $('#forgot_pop').show();
                });

                $("#successForgClo").click(function () {
                    $("#forgotSuccClose1").hide();
                });

                $("#recommd").click(function () {
                    $("#recomddd_pnl").show();
                });

                $(".recdclse").click(function () {
                    $("#recomddd_pnl").hide();
                });
            });

            /************************** Signup Form ***************************/

            $(document).ready(function () {
                $("#register_form").validate({
                    rules: {
                        fname: {required: true, lettersonly: true},
                        lname: {required: true, lettersonly: true},
                        /*mobile:{ required: true, number: true, maxlength: 10, minlength: 10 },*/
                        /* email: { required: true },*/
                        password: {required: true, minlength: 6},
                        cpassword: {required: true, equalTo: "#password"},
                        register_terms: {required: true}
                    },

                    messages: {
                        fname: {required: "Please enter your first name! ",},
                        lname: {required: "Please enter your last name! ",},
                        /*mobile:{ required: "Please enter your mobile number!",
                          number: "Please enter your valid 10 digits mobile number!",
                          maxlength: "Please enter your 10 digits mobile number!",
                          minlength: "Please enter your 10 digits mobile number!"
                        },*/
                        /* email: { required: "Please enter valid email Id! " },*/
                        password: {
                            required: "Please enter password! ",
                            minlength: "Minimum 6 digits are allowed!"
                        },
                        cpassword: {required: "Please enter confirm password! "},
                        register_terms: {required: "Please check terms & condition ! "}
                    },
                    errorPlacement: function (error, element) {
                        if (element.attr("name") == "register_terms")  //Id of input field
                        {
                            error.appendTo('#register_termsError');
                        }
                        else {
                            error.insertAfter(element);
                        }

                    },
                    //perform an AJAX post to ajax.php

                    submitHandler: function () {
                        var datastring = $("#register_form").serialize();
                        $.ajax({
                            url: "https://www.arcangelbattery.com/register",
                            type: "POST",
                            data: {val: datastring},
                            success: function (data) {

                                console.log(data);

                                if ($.trim(data) == 'done') {
                                    $('#register_pop').hide();
                                    $('#regisSuccClose1').show();
                                    $('#register_form').each(function () {
                                        this.reset();
                                    });
                                    $('#rpc').hide();
                                }
                                else {
                                    $("#msgR").html(data);
                                }
                            },
                            error: function () {
                            }
                        });
                    }
                });
            });

            /************************** End Register Form ***************************/

            /************************** Login Form ***************************/
            $(document).ready(function () {
                $("#login_form6").validate({
                    rules: {

                        /*  email: { required: true, email: true },*/


                        email: {required: true},
                        password: {required: true},
                    },

                    messages: {
                        email: {required: "Please enter valid email Id! "},


                        /*     email: { required: "Please enter valid email Id! ", email:"Please enter valid email Id! " },*/


                        password: {required: "Please enter password!"},
                    },
                    //perform an AJAX post to ajax.php

                    submitHandler: function () {
                        var datastring = $("#login_form6").serialize();
                        $.ajax({
                            url: "https://www.arcangelbattery.com/login",
                            type: "POST",
                            data: {val: datastring},
                            success: function (data) {
                                if ($.trim(data) == 'done') {
                                    window.location.href = 'https://www.arcangelbattery.com/dashboard';
                                }
                                else if (data == 'checkout') {
                                    window.location.href = 'https://www.arcangelbattery.com/billing-shipping';
                                }
                                else {
                                    $("#msgsng").html(data);
                                }
                            },
                            error: function () {
                            }
                        });
                    }
                });
            });

            $(document).ready(function () {
                $("#login_form, #login_form1, #login_form2").validate({
                    rules: {
                        /*email: { required: true },*/

                        /*email: { required: true, email: true },*/

                        password: {required: true},
                    },

                    messages: {
                        /*email: { required: "Please enter valid email Id! " },*/
                        /* email: { required: "Please enter valid email Id! ", email:"Please enter valid email Id! " },*/

                        password: {required: "Please enter password!"},
                    },
                    //perform an AJAX post to ajax.php

                    submitHandler: function () {
                        var datastring = $("#login_form, #login_form1, #login_form2").serialize();
                        $.ajax({
                            url: "https://www.arcangelbattery.com/login",
                            type: "POST",
                            data: {val: datastring},
                            success: function (data) {
                                if ($.trim(data) == 'done') {
                                    window.location.href = 'https://www.arcangelbattery.com/dashboard';
                                }
                                else if ($.trim(data) == 'checkout') {
                                    window.location.href = 'https://www.arcangelbattery.com/billing-shipping';
                                }
                                else {
                                    $("#msgL").html(data);
                                }
                            },
                            error: function () {
                            }
                        });
                    }
                });
            });
            /************************** End Login ***************************/


            /************************** Forgot Form ***************************/

            $(document).ready(function () {
                $("#forgot_form").validate({
                    rules: {
                        /*email: { required: true, email: true },*/
                    },

                    messages: {
                        /* email: { required: "Please enter valid email Id! ", email:"Please enter valid email Id! " },*/
                    },
                    //perform an AJAX post to ajax.php

                    submitHandler: function () {
                        var datastring = $("#forgot_form").serialize();
                        //alert(datastring);return false;
                        $.ajax({
                            url: "https://www.arcangelbattery.com/forgot_password",
                            type: "POST",
                            data: {val: datastring},
                            success: function (data) {
                                if ($.trim(data) == 'done') {
                                    $('#forgot_pop').hide();
                                    $('#forgotSuccClose1').show();

                                    $('#forgot_form').each(function () {
                                        this.reset();
                                    });
                                    $('#rpcF').hide();
                                }
                                else {
                                    $("#msgF").html(data);
                                }
                            },
                            error: function () {
                            }
                        });
                    }
                });
            });

            /************************** End Forgot Form ***************************/

            /************************** Recommend Form ***************************/

            $(document).ready(function () {
                $("#recommend_form").validate({
                    rules: {
                        recommend_to: {required: true, email: true},
                        recommend_from: {required: true, email: true}
                    },

                    messages: {
                        recommend_to: {
                            required: "Please enter email Id!",
                            email: "Please enter valid email Id!"
                        },
                        recommend_from: {
                            required: "Please enter email Id!",
                            email: "Please enter valid email Id!"
                        },
                    },
                    //perform an AJAX post to ajax.php

                    submitHandler: function () {
                        var datastring = $("#recommend_form").serialize();
                        //alert(datastring);return false;
                        $.ajax({
                            url: "https://www.arcangelbattery.com/recommend_form",
                            type: "POST",
                            data: {val: datastring},
                            success: function (data) {
                                if ($.trim(data) == 'done') {
                                    //$('#forgot_pop').hide();
                                    //$('#forgotSuccClose1').show();

                                    $('#recommend_form').each(function () {
                                        this.reset();
                                    });
                                    $('#rpcF').hide();
                                    $("#msgRec").html(data);
                                    //$('#recommend').delay(2000).fadeOut(2000);
                                }
                                else {
                                    $("#msgRec").html(data);
                                }
                            },
                            error: function () {
                            }
                        });
                    }
                });
            });

            /************************** End Recommend Form ***************************/
        </script>

        <div class="popupbox" id="forgot_pop" style="display:none">
            <div class="modal show" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <button type="button" class="forgotClose close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title">Forgot Password</h4>
                        </div><!-- end of modal-header -->
                        <div class="modal-body">
                            <!--<button type="button" class="forgotClose close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->

                            <div class="clear"></div><!-- end of clear -->
                            <div id="msgF"></div>
                            <br>
                            <form method="post" id="forgot_form" class="form" autocomplete="off" novalidate="novalidate">
                                <div class="form-group col-xs-12">
                                    <input type="text" name="email" class="form-control" placeholder="Email" required="" aria-required="true">
                                </div><!-- end of form-group -->

                                <div class="col-xs-12"><input type="submit" value="Send" class="btn pop_sign btn-md form-control">
                                    <h6 class="text-center">If you are already a member, please
                                        <a href="javascript:void(0)" id="showLogin1"> SIGN IN</a>
                                    </h6>
                                </div>
                            </form><!-- end of form -->


                        </div><!-- end of modal-body -->
                        <div class="cl"></div>
                    </div><!-- end of modal-content -->
                </div><!-- end of modal-dialog -->
            </div><!-- end of modal -->
        </div><!-- end of login -->

        <div class="popupbox" id="login_pop" style="display:none">
            <div class="modal show wow fadeIn animated" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <button type="button" class="logClose close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title">Login</h4>
                        </div><!-- end of modal-header -->
                        <div class="modal-body">
                            <!--     <button type="button" class="logClose close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                            <h4> If you have an account with us, please log in.</h4>
                            <br>
                            <div class="cl"></div><!-- end of clear -->
                            <div id="msgL" style="color: red; margin-left: 20px; margin-top: 5px;"></div>
                            <br>
                            <form method="post" id="login_form" class="form" autocomplete="off" novalidate="novalidate">
                                <div class="form-group col-xs-12">
                                    <input type="text" class="form-control" value="" name="email" placeholder="Email" required="" aria-required="true">
                                </div><!-- end of form-group -->
                                <div class="form-group col-xs-12">
                                    <input type="password" class="form-control" name="password" value="" placeholder="Password">
                                </div><!-- end of form-group -->
                                <div class="form-group col-xs-6">
                                    <div class="checkbox">
                                        <label style="font-size: 1em; padding-left: 0px;">
                                            <input type="checkbox" name="remember" value="1">
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            Remember me
                                        </label>
                                    </div><!-- end of checkbox -->
                                </div>
                                <div class="form-group col-xs-6 text-right">
                                    <label><a href="javascript:void(0)" id="forgot_pass">Forgot
                                            Password<span class="que">?</span></a></label>
                                </div>
                                <div class="col-xs-12">
                                    <input type="submit" value="Log In" class="btn pop_sign btn-md form-control">
                                    <!-- <span style="padding-left:10px;"><a href="https://www.facebook.com/dialog/oauth?client_id=251315198594952&redirect_uri=http%3A%2F%2Fwww.buyerbazaar.co.uk%2F&state=1ee1f71ed331fe74d2ac81ced3cbacaa&scope=email"><img src="assets/front/images/FB-login.png" alt="Fblogin" ></a></span>-->

                                </div>
                            </form><!-- end of form -->
                            <div class="cl"></div><!-- end of clear -->
                            <h6 class="text-center">Don’t have an account<span class="que">?</span> Please
                                <a href="javascript:void(0)" id="showRegister1"> SIGN UP</a>
                            </h6>
                        </div><!-- end of modal-body -->
                    </div><!-- end of modal-content -->
                </div><!-- end of modal-dialog -->
            </div><!-- end of modal -->
        </div><!-- end of login -->


        <div class="popupbox" style="display:none;" id="register_pop">
            <div class="modal show wow fadeIn animated" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog p_wdth" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <button type="button" class="regClose close cls" data-dismiss="modal" aria-label="Close"><span style="left:0px;" aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title">Register</h4>
                        </div><!-- end of modal-header -->
                        <div class="modal-body">
                            <div class="col-sm-12 col-xs-12">

                                <!--  <button style="right: -27px;top: -71px;" type="button" class="regClose close cls" data-dismiss="modal" aria-label="Close"><span style="left:0px;" aria-hidden="true">&times;</span></button>-->
                                <div class="cl"></div><!-- end of clear -->
                                <br>
                                <div id="msgR"></div>
                                <form method="post" id="register_form" class="form" autocomplete="off" novalidate="novalidate">
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" name="fname" placeholder="First Name">
                                    </div><!-- end of form-group -->
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" name="lname" placeholder="Last Name">
                                    </div><!-- end of form-group -->

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <input type="text" class="form-control" name="email" placeholder="Email" required="" aria-required="true">
                                    </div><!-- end of form-group -->

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <input type="text" class="form-control" name="mobile" placeholder="Mobile">
                                    </div><!-- end of form-group -->
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                    </div><!-- end of form-group -->
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password">
                                    </div><!-- end of form-group -->
                                    <div class="form-group col-sm-12 col-xs-12">
                                        <div class="">
                                            <label style="font-size: 1em;">
                                                <input type="checkbox" id="register_terms" name="register_terms" class="required" value="1" aria-required="true"> I
                                                agree to the terms &amp; conditions

                                                <!--<span class="cr"><i class="cr-icon fa fa-check"></i></span>-->

                                            </label>
                                            <br>
                                            <label id="register_terms-error" class="error" for="register_terms"></label>

                                        </div><!-- end of checkbox -->
                                    </div><!-- end of form-group -->
                                    <input type="hidden" name="type" value="User">
                                    <div class="col-xs-12"><input type="submit" value="Sign Up" class="btn pop_sign btn-md form-control">
                                        <h6 class="text-center">If you are already a member, please
                                            <a href="javascript:void(0)" id="showLogin2"> SIGN IN</a>
                                        </h6>
                                    </div>
                                </form><!-- end of form -->

                                <div class="cl"></div><!-- end of clear -->

                            </div><!-- end of col -->

                            <div class="cl"></div><!-- end of clear -->
                        </div><!-- end of modal-body -->
                    </div><!-- end of modal-content -->
                </div><!-- end of modal-dialog -->
            </div><!-- end of modal -->
        </div><!-- end of register -->


        <div class="popupbox regisSuccClose" id="regisSuccClose1" style="display:none;">
            <div class="modal show wow fadeIn animated" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <button style="right: -27px;top: -71px;" type="button" class="regClose close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <h4 style="font-size:21px;" class="modal-title" id="exampleModalLabel">Thank you for registering with us!</h4>
                        </div><!-- end of modal-header -->
                        <div class="modal-body">
                            <div class="col-sm-12 col-xs-12">
                                <!-- <button style="right: -27px;top: -71px;" type="button" class="regClose close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                                <div class="clear"></div><!-- end of clear -->
                                <br>
                                <p>
                                    Your account has been created, and a verification link has been
                                    sent to your registered email address.
                                    Please click on the verification link included in the email to
                                    activate your account.
                                    <br>
                                    <strong>Important!</strong> Your account will not be activated
                                    until you verify your email address.

                                </p>
                                <hr>
                                <div class="cl"></div><!-- end of clear -->
                                <h6 style="padding-left:90px;" class="text-center">If you are
                                    already a member, please
                                    <a href="javascript:void(0)" id="showLogin3">SIGN IN</a>
                                </h6>
                            </div><!-- end of col -->

                            <div class="cl"></div><!-- end of clear -->
                        </div><!-- end of modal-body -->
                    </div><!-- end of modal-content -->
                </div><!-- end of modal-dialog -->
            </div><!-- end of modal -->
        </div><!-- end of register -->


        <div class="popupbox" id="forgotSuccClose1" style="display:none;">
            <div class="modal show wow fadeIn animated" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <button type="button" id="successForgClo" class="forsucClose close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Arc-Angel-Battery</h4>
                        </div><!-- end of modal-header -->
                        <div class="modal-body">
                            <div class="col-sm-12 col-xs-12">

                                <!--<button type="button" id="successForgClo" class="forsucClose close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                                <div class="clear"></div><!-- end of clear -->
                                <br>
                                <p>
                                    A link to reset your password has been sent.
                                    <br>
                                    You may need to check your junk email or spam folder.
                                    <br>
                                    Please click on the link included in the email to reset your
                                    password.
                                    <br>


                                </p>
                                <hr>
                                <div class="cl"></div><!-- end of clear -->

                            </div><!-- end of col -->

                            <div class="cl"></div><!-- end of clear -->
                        </div><!-- end of modal-body -->
                    </div><!-- end of modal-content -->
                </div><!-- end of modal-dialog -->
            </div><!-- end of modal -->
        </div><!-- end of register -->

        <!--
        <div class="news_ltr">
          <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12 news_txt">
        <h2>Newsletter Sign Up<br>
        <small>Sign up and receive the latest news and events</small></h2>
                                 </div>
          <div class="col-md-8 col-sm-6 col-xs-12">
          <form method="post" name="newsletter" id="newsletter" action="https://www.arcangelbattery.com/sh_newsletter" class="form" autocomplete="off">
                    <div class="input-group">
                   <div class="suc_msg"> </div>
                        <input style="height:43px; margin-top:10px;" type="email" name="email" class="form-control" placeholder="Enter Your Email Address" required>
                        <span class="input-group-btn">
                     <input style="margin-top:10px;" type="submit" value="Subscribe" class="btn pop_sign btn-md form-control sbscr"/>
                           </span>
                    </div>

                 </form>
                                 </div>

                            </div>
                        </div>
        </div> -->

        <!-- start enquiry form -->
        <!-- end of enquiry form -->


        {{--        <footer class="footer">--}}
        {{--            <div class="container">--}}
        {{--                <div class="row">--}}
        {{--                    <div class="col-md-12">--}}
        {{--                        <div class="mbm">--}}
        {{--                            <img src="https://www.arcangelbattery.com/assets/front/images/footer-logo.png" alt="Arc Angel Battery">--}}
        {{--                        </div>--}}

        {{--                        <ul class="list-inline fotr_link">--}}

        {{--                            <li><a href="https://www.arcangelbattery.com/about-us/">About Us</a>--}}
        {{--                            </li>--}}
        {{--                            <li class="dvdr_none">|</li>--}}
        {{--                            <li><a href="https://www.arcangelbattery.com/products/">Products</a>--}}
        {{--                            </li>--}}
        {{--                            <li class="dvdr_none">|</li>--}}
        {{--                            <li><a href="https://www.arcangelbattery.com/Technical-Comparisons/">Technical Comparisons</a>--}}
        {{--                            </li>--}}
        {{--                            <li class="dvdr_none">|</li>--}}
        {{--                            <li><a href="https://www.arcangelbattery.com/faq/">FAQ's</a>--}}
        {{--                            </li>--}}
        {{--                            <li class="dvdr_none">|</li>--}}
        {{--                            <li><a href="https://www.arcangelbattery.com/contact-us/">Contact Us</a>--}}
        {{--                            </li>--}}
        {{--                            <li class="dvdr_none">|</li>--}}
        {{--                            <li><a href="https://www.arcangelbattery.com/Returns-Policy/">Return and Warranty Policy</a>--}}
        {{--                            </li>--}}
        {{--                            <li class="dvdr_none">|</li>--}}
        {{--                            <li><a href="https://www.arcangelbattery.com/terms-and-conditions/">Terms &amp; Conditions</a>--}}
        {{--                            </li>--}}
        {{--                            <li class="dvdr_none">|</li>--}}
        {{--                            <li><a href="https://www.arcangelbattery.com/signup/">Become An Affiliate</a>--}}
        {{--                            </li>--}}
        {{--                            <li class="dvdr_none">|</li>--}}
        {{--                            <li><a href="https://www.arcangelbattery.com/affiliate-login/">Affiliate Login</a>--}}
        {{--                            </li>--}}

        {{--                        </ul>--}}




        {{--                        <div class="cl"></div>--}}

        {{--                        <div class="social_outer">--}}
        {{--                            <div class="social">--}}
        {{--                                <a class="face" href="https://www.facebook.com/Arc-Angel-Battery-172640030326755/?modal=admin_todo_tour" target="_blank"><i class="fa fa-facebook fa-fw"></i></a>--}}
        {{--                                <!--  <a class="twit" href="#" target="_blank"><i class="fa fa-twitter fa-fw "></i></a>--}}
        {{--                                  <a class="link" href="#" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>--}}
        {{--                                  <a class="gplus" href="#" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a> -->--}}
        {{--                            </div>--}}


        {{--                            <div class="cl"></div>--}}
        {{--                            <p>Join us for more inspiration!</p>--}}
        {{--                            <p class="f_copy">Copyright © 2018 Arc-Angel Battery LLC. All rights--}}
        {{--                                reserved.</p>--}}
        {{--                            <img border="0" style="margin-top:10px;" alt="BBB Accredited Business" src="https://seal-houston.bbb.org/gen-seals/img.png?bid=90061993&amp;w=293&amp;h=61&amp;color=blue&amp;v=2&amp;chk=CBB2CE9890">--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </footer>--}}

    </div>  <!-- Wrapper end -->


    <!-- javascript -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/jquery.js"></script> -->
    <script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/engine1/wowslider.js"></script>
    <!--  <script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/engine1/script.js"></script>-->
    <script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/bootstrap.js"></script>

    <script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/wow.js"></script>
    <script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/elevatezoom.js"></script>
    <script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/lightslider.js"></script>
    <script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/smartmenus.js"></script>
    <script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/smartmenus.bootstrap.js"></script>
    <script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/range-modernizr.js"></script>
    <script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/range-slider.js"></script>
    <script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/star-rating.js"></script>
    <script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/custom.js"></script>
    <script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/bootstrap-slider.js"></script>
    <script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/smoothscroll.js"></script>


    <script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/lightweightLightbox.min.js"></script>

    <script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/responsiveCarousel.min.js"></script>

    <script type="text/javascript">
        $(".lightbox-container").lightweightLightbox();
    </script>
    <!--
    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-36251023-1']);
      _gaq.push(['_setDomainName', 'jqueryscript.net']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>

    -->
    <!-- End javascript -->


    <!--     validation starts here       -->
    <script src="https://www.arcangelbattery.com//assets/front/validation/jquery.validate.js"></script>
    <script src="https://www.arcangelbattery.com/assets/front/validation/validate.js"></script>
    <!--   End validation   -->

    <!-- End javascript -->

@include('site.partials.footer')




