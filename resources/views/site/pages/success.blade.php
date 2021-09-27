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
    <section class="section-pagetop bg-white">
        <div class="container clearfix">
            <h2 class="title-page">Order Completed</h2>
        </div>
    </section>
    <section class="section-content bg padding-y border-top">
        <div class="container">
            <div class="row">
                <main class="col-sm-12">
                    <br>
                    <p class="alert alert-success">Your order placed successfully. Your order number is : {{ $order->order_number }}.</p></main>
            </div>
        </div>
    </section>
    <br><br>
    <div class="container">

        <div class="d-flex flex-row justify-content-between" >
            <div class="col-md-6">
                <table class="m-auto">
                    <tbody>
                    <tr class="text-center">
                        <td>&nbsp;</td>
                        <th scope="row" class="border-bottom text-left px-3">Order Number:</th>
                        <td class="border-bottom text-left px-3">{{ $order->order_number }}</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr class="text-center">
                        <td>&nbsp; &nbsp;</td>
                        <th scope="row" class="border-bottom text-left px-3">Paypal Transaction #:</th>
                        <td class="border-bottom text-left px-3">{{ $order->payment_method }}</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr class="text-center">
                        <td>&nbsp;</td>
                        <th scope="row" class="border-bottom text-left px-3">Invoice Date:</th>
                        <td class="border-bottom text-left px-3">{{ $result->create_time }}</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">&nbsp;</th>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <table class="m-auto w-50">
                    <tbody>
                    <tr class="text-center">
                        <td>&nbsp;</td>
                        <th scope="row" class="border-bottom text-left px-3">Sub Total:</th>
                        <td class="border-bottom text-left px-3">${{ number_format($order->subtotal,2,'.',',') }}</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr class="text-center">
                        <td>&nbsp; &nbsp;</td>
                        <th scope="row" class="border-bottom text-left px-3">Shipping:</th>
                        <td class="border-bottom text-left px-3">${{ number_format($order->shipping,2,'.',',') }}</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr class="text-center">
                        <td>&nbsp;</td>
                        <th scope="row" class="border-bottom text-left px-3">Discounts:</th>
                        <td class="border-bottom text-left px-3"></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr class="text-center">
                        <td>&nbsp;</td>
                        <th scope="row" class="border-bottom text-left px-3">Total:</th>
                        <td class="border-bottom text-left px-3">$ {{ number_format( $order->grand_total,2,'.',',') }}</td>
                        <td>&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
            <br><br>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="d-flex flex-row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="height:100%;">
                <div class="card-body">
                    <h4 class="card-title">Shopping Cart Items</h4>
                    <table class="table table-hover table-bordered thead-light checkout-table">
                        <tbody>
                        <tr class="thead-light table-light">
                            <th scope="col">Item</th>
                            <th scope="col">Price</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        @foreach($itemlist as $item)
                            <tr class="p-3">
                                <td>{{ $item->name }}</td>
                                <td>${{ number_format($item->price,2,'.',',') }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ number_format($item->quantity * $item->price,2,'.',',') }}</td>
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
        </div>
    </div>
    <div class="container">
        <div class="d-flex flex-row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Billing Information</h4>
                    <table class="table table-hover table-bordered">
                        <tbody>
                        <tr>
                            <th scope="row">Name</th>
                            <td>&nbsp;</td>
                            <td colspan="5">{{ $order["billing_first_name"].' '.$order["billing_last_name"] }}
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Address</th>
                            <td>&nbsp;</td>
                            <td colspan="6">{{ $order["billing_address"] }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">City, State  Zip</th>
                            <td>&nbsp;</td>
                            <td>{{ $order["billing_city"].', '.$order["billing_post_code"] }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Country</th>
                            <td>&nbsp;</td>
                            <td colspan="6">
{{--                        {{ $bcountry->country }}   --}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">email</th>
                            <td>&nbsp;</td>
                            <td colspan="6">{{ $order["billing_email"] }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Phone Number</th>
                            <td>&nbsp;</td>
                            <td colspan="6">{{ $order["billing_phone_number"] }}
                            </td>
                        </tr>
{{--                        <tr>--}}
{{--                            <th scope="row">&nbsp;</th>--}}
{{--                            <td>&nbsp;</td>--}}
{{--                            <td>&nbsp;</td>--}}
{{--                            <td>&nbsp;</td>--}}
{{--                            <td>&nbsp;</td>--}}
{{--                            <td>&nbsp;</td>--}}
{{--                            <td>&nbsp;</td>--}}
{{--                            <td>&nbsp;</td>--}}
{{--                        </tr>--}}
                        </tbody>
                    </table>
                    <br><br>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Shipping Information</h4>
                    <table class="table table-hover table-bordered">
                        <tbody>
                        <tr>
                            <th scope="row">Name</th>
                            <td>&nbsp;</td>
                            <td colspan="6">{{ $order["shipping_first_name"].' '.$order["shipping_last_name"] }}
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Address</th>
                            <td>&nbsp;</td>
                            <td colspan="6">{{ $order["shipping_address"] }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">City, State  Zip</th>
                            <td>&nbsp;</td>
                            <td>{{ $order["shipping_city"].', '.$order["shipping_post_code"] }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Country</th>
                            <td>&nbsp;</td>
                            <td colspan="6">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">email</th>
                            <td>&nbsp;</td>
                            <td colspan="6">{{ $order["shipping_email"] }}
                                <input type="hidden" name="shipping_email" id="shipping_email" value="{{ $order["shipping_email"] }}">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Phone Number</th>
                            <td>&nbsp;</td>
                            <td colspan="6">{{ $order["shipping_phone_number"] }}
                            </td>
                        </tr>
                         </tbody>
                    </table>
                    <br><br>
                </div>
            </div>
        </div>
        <br/>
        <br/>
        </div>
    </div>
</div>
@include('site.partials.footer')
