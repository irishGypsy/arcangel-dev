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
            <h2 class="title-page">Checkout</h2>
        </div>
    </section>
    <section class="section-content padding-y" style="background-color: white;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @if (Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                </div>
            </div>
            <form action="{{ route('checkout.review.order') }}" method="POST" role="form">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <header class="card-header">
                                <h4 class="card-title mt-2">Billing Details</h4>
                            </header>
                        </div>
                        <article class="card-body">
                            <div class="form-row">
                                <div class="col form-group">
                                    <label>First name <span class="m-l-5 text-danger"> *</span></label>
                                    <input type="text" class="form-control" id="billing_first_name" name="billing_first_name" value="{{ $profile->billing_first_name }}">
                                </div>
                                <div class="col form-group">
                                    <label>Last name <span class="m-l-5 text-danger"> *</span></label>
                                    <input type="text" class="form-control" id="billing_last_name" name="billing_last_name" value="{{ $profile->billing_last_name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address <span class="m-l-5 text-danger"> *</span></label>
                                <input type="text" class="form-control" id="billing_address" name="billing_address" value="{{ $profile->billing_address }}">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>City <span class="m-l-5 text-danger"> *</span></label>
                                    <input type="text" class="form-control" id="billing_city" name="billing_city" value="{{ $profile->billing_city }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="billing_state">State</label>
                                    <select name="billing_state" id="billing_state" class="form-control @error('billing_state') is-invalid @enderror">
                                        <option value="0">Choose...</option>
                                        @foreach($states as $s)
                                            @if($profile->billing_state_id == $s->id)
                                                <option value="{{$s->id}}" selected>{{$s->state}}</option>
                                            @else
                                                <option value="{{$s->id}}">{{$s->state}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('billing_state') {{ $message }} @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Post Code <span class="m-l-5 text-danger"> *</span></label>
                                    <input type="text" class="form-control" id="billing_post_code" name="billing_post_code" value="{{ $profile->billing_zip }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="billing_country">Country</label>
                                    <select name="billing_country" id="billing_country" class="form-control @error('billing_country') is-invalid @enderror">
                                        <option value="0">Choose...</option>
                                        @foreach($country_codes as $s)
                                            @if($profile->shipping_countrycode_id == $s->id)
                                                <option value="{{$s->id}}" selected>{{$s->country}}</option>
                                            @else
                                                <option value="{{$s->id}}">{{$s->country}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('billing_country') {{ $message }} @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Phone Number <span class="m-l-5 text-danger"> *</span></label>
                                    <input type="text" class="form-control" id="billing_phone_number" name="billing_phone_number" value="{{ $profile->billing_phone_number }}">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Email Address <span class="m-l-5 text-danger"> *</span></label>
                                <input type="text" class="form-control" id="billing_email" name="billing_email" value="{{ auth()->user()->email }}">
                                <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="sameAs" name="billing_sameAs">
                                <label for="sameAs">Shipping details same as billing</label>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <header class="card-header">
                                        <h4 class="card-title mt-2">Your Order</h4>
                                    </header>
                                    <article class="card-body">
                                        <dl class="dlist-align">
                                            <dt>Total cost: </dt>
                                            <dd class="text-right h5 b"> {{ config('settings.currency_symbol') }}
                                {{ number_format(\Cart::session(Auth::guard()->user()->id)->getSubTotal(),2,'.',',') }}

                                            </dd>
                                        </dl>
                                    </article>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <button type="submit" class="subscribe btn btn-primary btn-lg btn-block">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <header class="card-header">
                                <h4 class="card-title mt-2">Shipping Details</h4>
                            </header>
                            <article class="card-body">
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>First name <span class="m-l-5 text-danger"> *</span></label>
                                        <input type="text" class="form-control" id="shipping_first_name" name="shipping_first_name" value="{{ $profile->shipping_first_name }}">
                                    </div>
                                    <div class="col form-group">
                                        <label>Last name <span class="m-l-5 text-danger"> *</span></label>
                                        <input type="text" class="form-control" id="shipping_last_name" name="shipping_last_name" value="{{ $profile->shipping_last_name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Address <span class="m-l-5 text-danger"> *</span></label>
                                    <input type="text" class="form-control" id="shipping_address" name="shipping_address" value="{{ $profile->shipping_address }}">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>City <span class="m-l-5 text-danger"> *</span></label>
                                        <input type="text" class="form-control" id="shipping_city" name="shipping_city" value="{{ $profile->shipping_city }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label" for="shipping_state">State</label>
                                        <select name="shipping_state" id="shipping_state" class="form-control @error('shipping_state') is-invalid @enderror">
                                            <option value="0">Choose...</option>
                                            @foreach($states as $s)
                                                @if($profile->shipping_state_id == $s->id)
                                                    <option value="{{$s->id}}" selected>{{$s->state}}</option>
                                                @else
                                                    <option value="{{$s->id}}">{{$s->state}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('shipping_state') {{ $message }} @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Post Code <span class="m-l-5 text-danger"> *</span></label>
                                        <input type="text" class="form-control" id="shipping_post_code" name="shipping_post_code" value="{{ $profile->shipping_zip }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label" for="shipping_country">Country</label>
                                        <select name="shipping_country" id="shipping_country" class="form-control @error('shipping_country') is-invalid @enderror">
                                            <option value="0">Choose...</option>
                                            @foreach($country_codes as $s)
                                                @if($profile->billing_countrycode_id == $s->id)
                                                    <option value="{{$s->id}}" selected>{{$s->country}}</option>
                                                @else
                                                    <option value="{{$s->id}}">{{$s->country}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('shipping_country') {{ $message }} @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Phone Number <span class="m-l-5 text-danger"> *</span></label>
                                        <input type="text" class="form-control" id="shipping_phone_number" name="shipping_phone_number" value="{{ $profile->shipping_phone_number }}">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Email Address <span class="m-l-5 text-danger"> *</span></label>
                                    <input type="text" class="form-control" id="shipping_email" name="shipping_email" value="{{ auth()->user()->email }}">
                                    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label>Order Notes</label>
                                    <textarea class="form-control" id="notes" name="notes" rows="6"></textarea>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <br><br>
    </section>
</div>

<script>
    $(document).ready(function () {
        $("#sameAs").click(function () {
            if ($('#sameAs').is(':checked')) {
                $("#shipping_first_name").val($("#billing_first_name").val());
                $("#shipping_last_name").val($("#billing_last_name").val());
                $("#shipping_email").val($("#billing_email").val());
                $("#shipping_address").val($("#billing_address").val());
                $("#shipping_city").val($("#billing_city").val());
                $("#shipping_post_code").val($("#billing_post_code").val());
                $("#shipping_state").val($("#billing_state").val());
                $("#shipping_country").val($("#billing_country").val());
                $("#shipping_phone_number").val($("#billing_phone_number").val());

            }
            else {
                $("#shipping_first_name").val('');
                $("#shipping_last_name").val('');
                $("#shipping_email").val('');
                $("#shipping_address").val('');
                $("#shipping_city").val('');
                $("#shipping_post_code").val('');
                $("#shipping_state").val('');
                $("#shipping_country").val('');
                $("#shipping_phone_number").val('');
            }
        });
    });


</script>

@include('site.partials.footer')
