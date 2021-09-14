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

    <section class="section-pagetop" style="background-color: white; border-style:solid;">
        <br>
            <div class="col-sm-12 bg-white">
                @if (Session::has('message'))
                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif
            </div>
        <br>
        <div class="container clearfix">
            <h2 class="title-page">Shopping Cart</h2>
        </div>
    </section>

<section style="background-color: white;">
    <div class="d-flex flex-column" style="background-color: white;">

        <div class="d-flex flex-row justify-content-center">
            @if (\Cart::isEmpty())
                <div class="col-lg-7 m-lg-3">

                        <p class="alert alert-warning">Your shopping cart is empty.</p>
                </div>
            @else
                <div class="col-lg-7 m-lg-3">
                    <div class="card">
                        <table class="table table-hover shopping-cart-wrap">
                            <thead class="text-muted bg-light">
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col" width="120">Quantity</th>
                                <th scope="col" width="120">Price</th>
                                <th scope="col" width="120">Shipping</th>
                                <th scope="col" width="120">Subtotal</th>
                                <th scope="col" class="text-right" width="200">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\Cart::getContent() as $item)
                                <tr><tr><td><div style="height: 30px;"></div> </td></tr>
    {{--                                    Name of product--}}
                                    <td style="vertical-align: middle;">
{{--                                        <div class="d-flex flex-column align-content-end">--}}
{{--                                        <div class="media">--}}
                                            <div class="media-body" style="vertical-align: middle;">
                                                <h6 class="title text-truncate">{{ Str::words($item->name,20) }}</h6>
                                            </div>
{{--                                        </div>--}}
{{--                                        </div>--}}
                                    </td>
    {{--                                    Quantity of item  --}}
                                    <td style="text-align: center;">
                                        <div class="d-flex flex-row align-items-center">
                                            <a href="{{ route('checkout.cart.subtractQty', $item->id) }}">
                                                <i class="fa fa-minus-square"></i>
                                            </a>
                                            <h4 class="price mx-sm-2">{{ $item->quantity }}</h4>
                                            <a href="{{ route('checkout.cart.addQty', $item->id) }}">
                                                <i class="fa fa-plus-square"></i>
                                            </a>
                                        </div>
                                    </td>
    {{--                                    Price of each item  --}}
                                    <td style="vertical-align: middle;">
                                        <div class="price-wrap" style="vertical-align: middle;">
                                            <var class="price">${{ config('settings.currency_symbol'). $item->price }}</var>
                                            <small class="text-muted">each</small>
                                        </div>
                                    </td>
    {{--                                    Shipping cost per item  --}}
                                    <td style="vertical-align: middle;">
                                        <div class="price-wrap">
                                            <var class="price">
                                                ${{ $item->attributes->shipping }}
                                            </var>
                                            <small class="text-muted">each</small>
                                        </div>
                                    </td>
    {{--                                    Subtotal of the line item  --}}
                                    <td style="vertical-align: middle;">
                                        <div class="price-wrap">
                                            <var class="price">
                                                ${{ \Cart::get($item->id)->getPriceSum() }}
                                            </var>
                                        </div>
                                    </td>

                                    <td class="text-right">
                                        <a href="{{ route('checkout.cart.remove', $item->id) }}" class="btn btn-primary"><i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <div class="col-lg-3 mt-3">
                <div class="border">
                    <div class="border d-flex flex-row justify-content-between p-2 ">
                        <div class="">Sub Total</div>
                        <div class="">$ {{ number_format(\Cart::getSubTotalWithoutConditions(),2,'.',',') }}</div>
                    </div>
                    <br>
                    <div class="border d-flex flex-row justify-content-between p-2 ">
                        <div class="">Shipping</div>
                        <div class="">${{ number_format($totalShipping,2,'.',',') }}</div>
                    </div>
                    <br>
                    <div class="border d-flex flex-row justify-content-between p-2 ">
                        <div class="">Coupon Discount</div>
                        <div class="">-($
                            {{ Cart::getConditions()->isEmpty() ? "0" : number_format(Cart::getConditions()['coupon']->parsedRawValue,2,'.',',') }})</div>
                    </div>
                    <br>
                    <div class="border bg-light d-flex flex-row justify-content-between p-2">
                        <div class="font-weight-bolder">Grand Total
                            <div class="font-weight-light">(inclusive of all taxes)
                            </div>
                        </div>
                        <div class="font-weight-bold"> $ {{ number_format(\Cart::getTotal(),2,'.',',') }}</div>
                    </div>
                </div>
            </div>
        </div>

<br>
            <div class="d-flex flex-row justify-content-around">
                <div class="col-lg-4 mx-lg-1 border border-light" style="width:60%;">
                    <form class="border border-light" action="{{route('checkout.cart.applycouponcode')}}" method="post" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="font-weight-bold p-2 border-light bg-light">Apply Coupon Code</div>
                        <label for="coupon_code" class="p-2">Enter Coupon Code</label>
                        <input class="form-control input-text" id="coupon_code" name="coupon_code"/>
                        <button type="submit" class="button button-primary btn-lg m-lg-1 p-lg-1" style="height:40px">Apply Coupon</button>
                    </form>
                </div>

                <div class="col-lg-4 mt-3 ml-5 pl-5 d-flex flex-row justify-content-center p-2 border border-light border-top border-bottom" style="height:60px">
                    <a href="{{ route('products.list') }}" type="button" style="height:40px;width:140px;" class="button button-primary btn-lg m-lg-2 ">Continue Shopping</a>
                    <a href="{{ route('checkout.index') }}" style="height:40px;width:140px;" class="button button-primary btn-lg m-lg-2 ">Checkout</a>
                </div>
            </div>
    </div>
<br>
{{--   {{ Cart::getTotal() }}--}}
{{--    <br> - <br>--}}
{{--    {{ Cart::getConditions()['coupon']->parsedRawValue }}--}}
{{--    <br> = <br>--}}
{{--{{ Cart::getConditions()->isEmpty() ? "0" : Cart::getTotal() - Cart::getConditions()['coupon']->parsedRawValue }}--}}
{{--    {{ Cart::getConditions() }}--}}
{{--        {{ Cart::getConditions()['coupon']->parsedRawValue }}--}}
{{--        {{ Cart::clearCartConditions() }}--}}

<br>

</section>

@include('site.partials.footer')
