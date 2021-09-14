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
                $("#stickymenu").addClass('sticky');
            } else {
                $("#stickymenu").removeClass('sticky');
            }
        });
    </script>
</head>
<body style="background-color:#333333">
@include('site.partials.header')
@include('site.partials.nav')
<div class="bg-white">
    <br><br>
    <section class="section-pagetop" style="background-color: white;">
        <div class="container clearfix">
            <h2 class="title-page">Review Order</h2>
        </div>
        <br>
    </section>
    <section class="section-content padding-y" style="background-color: white;">

        <div class="container">
<form method="POST" action="{{ route('checkout.place.order') }}" name="placeOrder" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-8">
                    <div class="card" style="height:100%;">
                        <div class="card-body">
                            <h4 class="card-title">Shopping Cart Items</h4>
                            <table class="table table-hover table-bordered thead-light checkout-table">
                                <tbody>
                                <tr class="thead-light table-light">
                                    <th scope="col">Item</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Shipping</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                @foreach(\Cart::getContent() as $item)
                                    <tr class="p-3">
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->attributes->shipping }}</td>
                                        <td>${{ \Cart::get($item->id)->getPriceSum() }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                </tbody>
                            </table>
                            <br><br>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body" style="background-color: lightgray !important;">
                            <div>
                                <h5 class="card-title checkoutcardtitle">Totals</h5>
                            </div>
                        </div>

                    <br>
                    <br/>
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-row justify-content-between">
                            <div class="p-3">Subtotal
                            </div>
                            <div class="p-3">$ {{ number_format(\Cart::getSubTotalWithoutConditions(),2,'.',',') }}
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between">
                            <div class="p-3">Shipping
                            </div>
                            <div class="p-3">
                               ${{ number_format($totalShipping,2,'.',',') }}
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between">
                            <div class="p-3">Coupon Discount
                            </div>
                            <div class="p-3"> - $({{ Cart::getConditions()->isEmpty() ? "0" : number_format(Cart::getConditions()['coupon']->parsedRawValue,2,'.',',') }})
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between">
                            <div class="p-3">Grand Total
                            </div>
                            <div class="p-3">  $ {{ number_format(\Cart::getTotal(),2,'.',',') }}
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                </div>


            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Billing Information</h4>
                            <table class="table table-hover table-bordered thead-light-v checkout-table">
                                <tbody>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td>&nbsp;</td>
                                    <td colspan="6">{{ $params["billing_first_name"].' '.$params["billing_last_name"] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Address</th>
                                    <td>&nbsp;</td>
                                    <td colspan="6">{{ $params["billing_address"] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">City, State  Zip</th>
                                    <td>&nbsp;</td>
                                    <td>{{ $params["billing_city"].', '.$params["billing_state"].'    '.$params["billing_post_code"] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Country</th>
                                    <td>&nbsp;</td>
                                    <td colspan="6">{{ $params["billing_country"] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">email</th>
                                    <td>&nbsp;</td>
                                    <td colspan="6">{{ $params["billing_email"] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone Number</th>
                                    <td>&nbsp;</td>
                                    <td colspan="6">{{ $params["billing_phone_number"] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">&nbsp;</th>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                </tbody>
                            </table>
                            <br><br>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">

                            <div>
                                <input type="radio" class="p-3" name="payWith" value="paypal" id="payWithPaypal">
                                <label class="p-3" for="payWithPaypal">Pay with Paypal</label>
                            </div>
                            <div>
                                <input type="radio" class="p-3" name="payWith" value="crypto" id="payWithCrypto">
                                <label class="p-3" for="payWithCrypto">Pay with Cryptocurrency</label>
                            </div>
                            <br>
                            <div>
                                <button type="submit" class="button button-primary" style="height:40px; width:140px;">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Shipping Information</h4>
                            <table class="table table-hover table-bordered thead-light-v checkout-table">
                                <tbody>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td>&nbsp;</td>
                                    <td colspan="6">{{ $params["shipping_first_name"].' '.$params["shipping_last_name"] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Address</th>
                                    <td>&nbsp;</td>
                                    <td colspan="6">{{ $params["shipping_address"] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">City, State  Zip</th>
                                    <td>&nbsp;</td>
                                    <td>{{ $params["shipping_city"].', '.$params["shipping_state"].'    '.$params["shipping_post_code"] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Country</th>
                                    <td>&nbsp;</td>
                                    <td colspan="6">{{ $params["shipping_country"] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">email</th>
                                    <td>&nbsp;</td>
                                    <td colspan="6">{{ $params["shipping_email"] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone Number</th>
                                    <td>&nbsp;</td>
                                    <td colspan="6">{{ $params["shipping_phone_number"] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">&nbsp;</th>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <th scope="row">Order Notes:</th>
                                    <td>&nbsp;</td>
                                    <td colspan="6" rowspan="2">{{ $params['notes'] }}</td>

                                </tr>
                                <tr>
                                    <th scope="row">&nbsp;</th>
                                    <td>&nbsp;</td>
                                    <td></td>

                                </tr>
                                </tbody>
                            </table>

                            <br><br>
                        </div>
                    </div>
                </div>


            </div>



            <br/>

{{--            {{ Cart::getContent() }}--}}

            <br/>
</form>
        </div>










{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-sm-12">--}}
{{--                    @if (Session::has('error'))--}}
{{--                        <p class="alert alert-danger">{{ Session::get('error') }}</p>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <form action="{{ route('checkout.place.order') }}" method="POST" role="form">--}}
{{--                @csrf--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-8">--}}
{{--                        <div class="card">--}}
{{--                            <header class="card-header">--}}
{{--                                <h4 class="card-title mt-2">Billing Details</h4>--}}
{{--                            </header>--}}

{{--                        </div>--}}


{{--                        <article class="card-body">--}}
{{--                            <div class="form-row">--}}
{{--                                <div class="col form-group">--}}
{{--                                    <label>First name <span class="m-l-5 text-danger"> *</span></label>--}}
{{--                                    <input type="text" class="form-control" id="billing_first_name" name="billing_first_name">--}}
{{--                                </div>--}}
{{--                                <div class="col form-group">--}}
{{--                                    <label>Last name <span class="m-l-5 text-danger"> *</span></label>--}}
{{--                                    <input type="text" class="form-control" id="billing_last_name" name="billing_last_name">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Address <span class="m-l-5 text-danger"> *</span></label>--}}
{{--                                <input type="text" class="form-control" id="billing_address" name="billing_address">--}}
{{--                            </div>--}}
{{--                            <div class="form-row">--}}
{{--                                <div class="form-group col-md-6">--}}
{{--                                    <label>City <span class="m-l-5 text-danger"> *</span></label>--}}
{{--                                    <input type="text" class="form-control" id="billing_city" name="billing_city">--}}
{{--                                </div>--}}
{{--                                <div class="form-group col-md-6">--}}
{{--                                    <label>Country <span class="m-l-5 text-danger"> *</span></label>--}}
{{--                                    <input type="text" class="form-control" id="billing_country" name="billing_country">--}}
{{--                                </div>--}}
{{--                                <div class="form-group col-md-6">--}}
{{--                                    <label>State <span class="m-l-5 text-danger"> *</span></label>--}}
{{--                                    <input type="text" class="form-control" id="billing_state" name="billing_state">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-row">--}}
{{--                                <div class="form-group  col-md-6">--}}
{{--                                    <label>Post Code <span class="m-l-5 text-danger"> *</span></label>--}}
{{--                                    <input type="text" class="form-control" id="billing_post_code" name="billing_post_code">--}}
{{--                                </div>--}}
{{--                                <div class="form-group  col-md-6">--}}
{{--                                    <label>Phone Number <span class="m-l-5 text-danger"> *</span></label>--}}
{{--                                    <input type="text" class="form-control" id="billing_phone_number" name="billing_phone_number">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Email Address <span class="m-l-5 text-danger"> *</span></label>--}}
{{--                                <input type="email" class="form-control" id="billing_email" name="billing_email" value="{{ auth()->user()->email }}" disabled>--}}
{{--                                <small class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}

{{--                                <input type="checkbox" id="sameAs" name="billing_sameAs">--}}
{{--                                <label for="sameAs">Shipping details same as billing</label>--}}
{{--                            </div>--}}
{{--                        </article>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-12">--}}
{{--                                <div class="card">--}}
{{--                                    <header class="card-header">--}}
{{--                                        <h4 class="card-title mt-2">Your Order</h4>--}}
{{--                                    </header>--}}
{{--                                    <article class="card-body">--}}
{{--                                        <dl class="dlist-align">--}}
{{--                                            <dt>Total cost: </dt>--}}
{{--                                            <dd class="text-right h5 b"> {{ config('settings.currency_symbol') }}{{ \Cart::getSubTotal() }} </dd>--}}
{{--                                        </dl>--}}
{{--                                    </article>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-12 mt-4">--}}
{{--                                <button type="submit" class="subscribe btn btn-success btn-lg btn-block">Place Order</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-8">--}}
{{--                        <div class="card">--}}
{{--                            <header class="card-header">--}}
{{--                                <h4 class="card-title mt-2">Shipping Details</h4>--}}
{{--                            </header>--}}
{{--                            <article class="card-body">--}}
{{--                                <div class="form-row">--}}
{{--                                    <div class="col form-group">--}}
{{--                                        <label>First name <span class="m-l-5 text-danger"> *</span></label>--}}
{{--                                        <input type="text" class="form-control" id="shipping_first_name" name="shipping_first_name">--}}
{{--                                    </div>--}}
{{--                                    <div class="col form-group">--}}
{{--                                        <label>Last name <span class="m-l-5 text-danger"> *</span></label>--}}
{{--                                        <input type="text" class="form-control" id="shipping_last_name" name="shipping_last_name">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>Address <span class="m-l-5 text-danger"> *</span></label>--}}
{{--                                    <input type="text" class="form-control" id="shipping_address" name="shipping_address">--}}
{{--                                </div>--}}
{{--                                <div class="form-row">--}}
{{--                                    <div class="form-group col-md-6">--}}
{{--                                        <label>City <span class="m-l-5 text-danger"> *</span></label>--}}
{{--                                        <input type="text" class="form-control" id="shipping_city" name="shipping_city">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group col-md-6">--}}
{{--                                        <label>Country <span class="m-l-5 text-danger"> *</span></label>--}}
{{--                                        <input type="text" class="form-control" id="shipping_country" name="shipping_country">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group col-md-6">--}}
{{--                                        <label>State <span class="m-l-5 text-danger"> *</span></label>--}}
{{--                                        <input type="text" class="form-control" id="shipping_state" name="shipping_state">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-row">--}}
{{--                                    <div class="form-group  col-md-6">--}}
{{--                                        <label>Post Code <span class="m-l-5 text-danger"> *</span></label>--}}
{{--                                        <input type="text" class="form-control" id="shipping_post_code" name="shipping_post_code">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group  col-md-6">--}}
{{--                                        <label>Phone Number <span class="m-l-5 text-danger"> *</span></label>--}}
{{--                                        <input type="text" class="form-control" id="shipping_phone_number" name="shipping_phone_number">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>Email Address <span class="m-l-5 text-danger"> *</span></label>--}}
{{--                                    <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" disabled>--}}
{{--                                    <small class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>Order Notes</label>--}}
{{--                                    <textarea class="form-control" id="notes" name="notes" rows="6"></textarea>--}}
{{--                                </div>--}}
{{--                            </article>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
        <br><br>
    </section>
</div>

{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        $("#sameAs").click(function () {--}}
{{--            if ($('#sameAs').is(':checked')) {--}}
{{--                $("#shipping_first_name").val($("#billing_first_name").val());--}}
{{--                $("#shipping_last_name").val($("#billing_last_name").val());--}}
{{--                $("#shipping_email").val($("#billing_email").val());--}}
{{--                $("#shipping_address").val($("#billing_address").val());--}}
{{--                $("#shipping_city").val($("#billing_city").val());--}}
{{--                $("#shipping_post_code").val($("#billing_post_code").val());--}}
{{--                $("#shipping_state").val($("#billing_state").val());--}}
{{--                $("#shipping_country").val($("#billing_country").val());--}}
{{--                $("#shipping_phone_number").val($("#billing_phone_number").val());--}}

{{--            }--}}
{{--            else {--}}
{{--                $("#shipping_first_name").val('');--}}
{{--                $("#shipping_last_name").val('');--}}
{{--                $("#shipping_email").val('');--}}
{{--                $("#shipping_address").val('');--}}
{{--                $("#shipping_city").val('');--}}
{{--                $("#shipping_post_code").val('');--}}
{{--                $("#shipping_state").val('');--}}
{{--                $("#shipping_country").val('');--}}
{{--                $("#shipping_phone_number").val('');--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}


{{--</script>--}}

@include('site.partials.footer')
