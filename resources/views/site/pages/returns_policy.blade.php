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



<div id="wrapper">

{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function(){--}}
{{--            $("#searchform1f").validate();--}}
{{--        });--}}

{{--        $('.aimgactive').on('click',function() {--}}
{{--            alert('hi');--}}
{{--            $(".imgactive").removeClass("active");--}}
{{--            // $(".tab").addClass("active"); // instead of this do the below--}}
{{--            $(this).addClass("active");--}}
{{--        });--}}
{{--        function chagecurrency(currency){--}}
{{--            window.location="https://www.arcangelbattery.com/currency-convert/"+currency;--}}
{{--        }--}}
{{--    </script>--}}

    <div class="inner_banner">
        <img class="img-responsive" src="https://www.arcangelbattery.com/uploads/banner/retirm1702066349banner.jpg" alt="Return and Warranty Policy">
        <div class="about_txt">
            <h2>Return and Warranty Policy</h2>
            <small><a href="https://www.arcangelbattery.com/">Home</a> /<span> Return and Warranty Policy</span></small>
        </div>
    </div>
    <div class="cl"></div>
    <!-- content div start -->
    <div class="content_area">
        <div class="container content_litxt">
            <div class="row">
                <div class="col-md-12">
                    <div class="about_cntnt">
                        <h1>Return and Warranty Policy</h1>
                        <p><span style="font-size:12px"><span style="font-family:arial,helvetica,sans-serif">Warranty: In the event of a defective or improperly functioning battery within the 10 year warranty period please send the battery back. As long as the battery falls under the listed terms and conditions then the battery will be fully protected by the 10 year warranty.&nbsp;The consumer will be responsible for return shipping, once received we will issue a refund for the shipping and send a new battery back. The new warranty will start on the date you receive it and will be prorated&nbsp; based on how long you had the previous battery. So if you had the battery for 1 years you would have a 9 year warranty left on the new battery.</span></span></p>
                        <p><span style="font-size:12px"><span style="font-family:arial,helvetica,sans-serif">Returns: In the case you wish to reutrn the battery for any reason then please inform us within 30 days and we will process the return as soon as possible. Please note that if the battery is damaged, modified, or not returned within the 30 day window the purchased battery is not eligilble for a return.</span></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content div end -->
    <div class="cl"></div>
    <br><script>
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
</div>  <!-- Wrapper end -->

<!-- javascript -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/engine1/wowslider.js"></script>
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
<!--     validation starts here       -->
<script src="https://www.arcangelbattery.com//assets/front/validation/jquery.validate.js"></script>
<script src="https://www.arcangelbattery.com/assets/front/validation/validate.js"></script>
<!--   End validation   -->
<!-- End javascript -->

@include('site.partials.footer')
