<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') - {{ config('app.name') }}</title>
    @include('site.partials.styles')
    @include('site.partials.scripts')
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
                                    @foreach(\Cart::session(Auth::guard()->user()->id)->getContent() as $item)
                                        <tr class="p-3">
                                            <td>{{ $item->name }}
                                            <input type="hidden" id="cartItemName{{ $loop->index }}" name="cartItemName-{{$loop->index}}" value="{{$item->name}}">
                                            </td>
                                            <td>${{ number_format($item->price,2,'.',',') }}
                                                <input type="hidden" id="cartItemPrice{{ $loop->index }}" name="cartItemPrice-{{$loop->index}}" value="{{$item->price}}">
                                            </td>
                                            <td>{{ $item->quantity }}
                                                <input type="hidden" id="cartItemQuantity{{ $loop->index }}" name="cartItemQuantity-{{$loop->index}}" value="{{$item->Quantity}}">
                                            </td>
                                            <td>${{ number_format($item->attributes->shipping,2,'.',',') }}
                                                <input type="hidden" id="cartItemShipping{{ $loop->index }}" name="cartItemShipping-{{$loop->index}}" value="{{$item->attributes->shipping}}">
                                            </td>
                                            <td>${{ number_format(\Cart::get($item->id)->getPriceSum(),2,'.',',') }}
                                                <input type="hidden" id="cartItemSubTotal{{ $loop->index }}" name="cartItemSubTotal-{{$loop->index}}" value="{{\Cart::get($item->id)->getPriceSum()}}">
                                            </td>
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
                                <div class="p-3">$ {{ number_format(\Cart::session(Auth::guard()->user()->id)->getSubTotalWithoutConditions(),2,'.',',') }}

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
                                <div class="p-3">  $ {{ number_format(\Cart::session(Auth::guard()->user()->id)->getTotal(),2,'.',',') }}

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
                                        <td colspan="5">{{ $params["billing_first_name"].' '.$params["billing_last_name"] }}

                                        </td>
                                        <td><a href="" class="btn btn-primary pr-2"><i class="fa fa-edit fa-2x"></i></a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Address</th>
                                        <td>&nbsp;</td>
                                        <td colspan="6">{{ $params["billing_address"] }}

                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">City, State  Zip</th>
                                        <td>&nbsp;</td>
                                        <td>{{ $params["billing_city"].', '.$bstate->state.'    '.$params["billing_post_code"] }}

                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Country</th>
                                        <td>&nbsp;</td>
                                        <td colspan="6">{{ $bcountry->country }}

                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">email</th>
                                        <td>&nbsp;</td>
                                        <td colspan="6">{{ $params["billing_email"] }}

                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Phone Number</th>
                                        <td>&nbsp;</td>
                                        <td colspan="6">{{ $params["billing_phone_number"] }}

                                        </td>
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
                                <form method="POST" action="{{ route('checkout.place.order') }}" name="placeOrder" id="paypalForm" enctype="multipart/form-data">
                                    @csrf
                                <input type="hidden" name="billing_first_name" id="billing_first_name" value="{{ $params["billing_first_name"] }}">
                                <input type="hidden" name="billing_last_name" id="billing_last_name" value="{{ $params["billing_last_name"] }}">
                                <input type="hidden" name="shipping_first_name" id="shipping_first_name" value="{{ $params["shipping_first_name"] }}">
                                <input type="hidden" name="shipping_last_name" id="shipping_last_name" value="{{ $params["shipping_last_name"] }}">
                                <input type="hidden" name="billing_address" id="billing_address" value="{{ $params["billing_address"] }}">
                                <input type="hidden" name="shipping_address" id="shipping_address" value="{{ $params["shipping_address"] }}">
                                <input type="hidden" name="billing_city" id="billing_city" value="{{ $params["billing_city"] }}">
                                <input type="hidden" name="billing_state" id="billing_state" value="{{ $params["billing_state"] }}">
                                <input type="hidden" name="billing_post_code" id="billing_post_code" value="{{ $params["billing_post_code"] }}">
                                <input type="hidden" name="shipping_city" id="shipping_city" value="{{ $params["shipping_city"] }}">
                                <input type="hidden" name="shipping_state" id="shipping_state" value="{{ $params["shipping_state"] }}">
                                <input type="hidden" name="shipping_post_code" id="shipping_post_code" value="{{ $params["shipping_post_code"] }}">
                                <input type="hidden" name="billing_country" id="billing_country" value="{{ $params["billing_country"] }}">
                                <input type="hidden" name="shipping_country" id="shipping_country" value="{{ $params["shipping_country"] }}">
                                <input type="hidden" name="billing_email" id="billing_email" value="{{ $params["billing_email"] }}">
                                <input type="hidden" name="shipping_email" id="shipping_email" value="{{ $params["shipping_email"] }}">
                                <input type="hidden" name="billing_phone_number" id="billing_phone_number" value="{{ $params["billing_phone_number"] }}">
                                <input type="hidden" name="shipping_phone_number" id="shipping_phone_number" value="{{ $params["shipping_phone_number"] }}">
                                <input type="hidden" id="notes" name="notes" value="{{ $params['notes'] }}">
                                <input type="hidden" id="subtotal" name="subtotal" value="{{ \Cart::session(Auth::guard()->user()->id)->getSubTotalWithoutConditions() }}">
                                <input type="hidden" id="shipping" name="shipping" value="{{ $totalShipping }}">
                                <input type="hidden" id="total" name="total" value="{{ \Cart::session(Auth::guard()->user()->id)->getTotal() }}">
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
                                </form>
                                <form action="https://www.coinpayments.net/index.php" method="POST" id="cryptoForm">
                                    @csrf
                                    <input type="hidden" name="cmd" value="_pay">
                                    <input type="hidden" name="reset" value="1">
                                    <input type="hidden" name="merchant"
                                           value="08a26647941afdb919e29ec049d5084e">
                                    <input type="hidden" name="item_name" value="emporio">
                                    <input type="hidden" name="currency"
                                           value="USD">
                                    <input type="hidden" id="amountf" name="amountf"
                                           value="920">
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="allow_quantity" value="0">
                                    <input type="hidden" name="want_shipping" value="1">
                                    <input type="hidden" name="success_url"
                                           value="confirm1xcoinypaymentz2dets3">
                                    <input type="hidden" name="cancel_url"
                                           value="order-cancel">
                                    <input type="hidden" name="allow_extra" value="0">
                                    <div>
                                        <input type="radio" class="p-3" name="payWith" value="paypal" id="payWithPaypal2">
                                        <label class="p-3" for="payWithPaypal">Pay with Paypal</label>
                                    </div>
                                    <div>
                                        <input type="radio" class="p-3" name="payWith" value="crypto" id="payWithCrypto2">
                                        <label class="p-3" for="payWithCrypto">Pay with Cryptocurrency</label>
                                    </div>
                                    <br>
                                    <div>
                                        <button type="submit" class="button button-primary" style="height:40px; width:240px;">Buy Now with CoinPayments.net</button>
                                    </div>



                                </form>



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
                                        <td colspan="6">{{ $params["shipping_first_name"].' '.$params["shipping_last_name"] }}

                                        </td>
                                        <td><a href="" class="btn btn-primary pr-2"><i class="fa fa-edit fa-2x"></i></a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Address</th>
                                        <td>&nbsp;</td>
                                        <td colspan="6">{{ $params["shipping_address"] }}

                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">City, State  Zip</th>
                                        <td>&nbsp;</td>
                                        <td>{{ $params["shipping_city"].', '.$sstate->state.'    '.$params["shipping_post_code"] }}

                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Country</th>
                                        <td>&nbsp;</td>
                                        <td colspan="6">{{ $scountry->country }}

                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">email</th>
                                        <td>&nbsp;</td>
                                        <td colspan="6">{{ $params["shipping_email"] }}

                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Phone Number</th>
                                        <td>&nbsp;</td>
                                        <td colspan="6">{{ $params["shipping_phone_number"] }}

                                        </td>
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
                                        <td colspan="6" rowspan="2">{{ $params['notes'] }}

                                        </td>
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
                <br/>

        </div>
        <br><br>
    </section>
</div>

<script>

    $(document).ready( function() {
        $('#cryptoForm').hide();
        $('#amountf').val($('#total').val());
    })

    $('#payWithPaypal').change(function(){
        $('#paypalForm').show();
        $('#cryptoForm').hide();
        $('#payWithPaypal').attr('checked', true);
        $('#payWithCrypto').attr('checked', false);
        $('#payWithPaypal2').attr('checked', false);
        $('#payWithCrypto2').attr('checked', false);

    })

    $('#payWithCrypto').change(function(){
        $('#paypalForm').hide();
        $('#cryptoForm').show();
        $('#payWithPaypal').attr('checked', false);
        $('#payWithCrypto').attr('checked', true);
        $('#payWithPaypal2').attr('checked', false);
        $('#payWithCrypto2').attr('checked', false);

    })

    $('#payWithPaypal2').change(function(){
        $('#paypalForm').show();
        $('#cryptoForm').hide();
        $('#payWithPaypal').attr('checked', false);
        $('#payWithCrypto').attr('checked', false);
        $('#payWithPaypal2').attr('checked', true);
        $('#payWithCrypto2').attr('checked', false);

    })

    $('#payWithCrypto2').change(function(){
        $('#paypalForm').hide();
        $('#cryptoForm').show();
        $('#payWithPaypal').attr('checked', false);
        $('#payWithCrypto').attr('checked', false);
        $('#payWithPaypal2').attr('checked', false);
        $('#payWithCrypto2').attr('checked', true);

    })

</script>

@include('site.partials.footer')
