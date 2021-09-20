@extends('site.pages.profile')

@section('title') {{ $pageTitle }} @endsection

@section('content')

    <br><br>
    <div class="d-flex flex-row justify-content-center">
        <div class="app-title" style="width:800px;">
            <div>
                <h1><i class="fa fa-cogs"></i> {{ $pageTitle }}</h1>
            </div>
        </div>
    @include('admin.partials.flash')
    </div>
    <div class="row user d-flex flex-row justify-content-center">
        <div class="col-md-2">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
{{--                    --- Registered User visible ----  --}}
                    <li class="nav-item"><a class="nav-link active" href="#dashboard" data-toggle="tab">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="#myprofile" data-toggle="tab">My Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="#wishlist" data-toggle="tab">Wishlist</a></li>
                    <li class="nav-item"><a class="nav-link" href="#orders" data-toggle="tab">Orders</a></li>
                    <li class="nav-item"><a class="nav-link" href="#changepassword" data-toggle="tab">Change Password</a></li>
                    <li class="nav-item"><a class="nav-link" href="#addresseswallet" data-toggle="tab">Addresses & Wallet</a></li>
                    <li class="nav-item"><a class="nav-link" href="#affiliateprogram" data-toggle="tab">Affiliate Program</a></li>

                    @if(Auth::guard()->user()->is_affiliate)
                        <li class="nav-item"><a class="nav-link" href="#affiliatelinks" data-toggle="tab">Affiliate Links</a></li>
                        <li class="nav-item"><a class="nav-link" href="#referrals" data-toggle="tab">Referrals</a></li>
                        <li class="nav-item"><a class="nav-link" href="#payments" data-toggle="tab">Payments</a></li>
{{--                        <li class="nav-item"><a class="nav-link" href="#affiliateorders" data-toggle="tab">Affiliate Orders</a></li>--}}
                    @endif

                    <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}" data-toggle="tab">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="tab-content">
                <div class="tab-pane active" id="dashboard">
                    @include('site.profile.includes.dashboard')
                </div>
                <div class="tab-pane fade" id="myprofile">
                    @include('site.profile.includes.myprofile')
                </div>
                <div class="tab-pane fade" id="wishlist">
                    @include('site.profile.includes.wishlist')
                </div>
                <div class="tab-pane fade" id="orders">
                    @include('site.profile.includes.orders')
                </div>
                <div class="tab-pane fade" id="changepassword">
                    @include('site.profile.includes.changepassword')
                </div>
                <div class="tab-pane fade" id="addresseswallet">
                    @include('site.profile.includes.addresseswallet')
                </div>
                <div class="tab-pane fade" id="affiliateprogram">
                    @include('site.profile.includes.affiliateprogram')
                </div>

                @if(Auth::guard()->user()->is_affiliate)

                    <div class="tab-pane fade" id="affiliatelinks">
                        @include('site.profile.includes.affiliatelinks')
                    </div>
                    <div class="tab-pane fade" id="referrals">
                        @include('site.profile.includes.referrals')
                    </div>
                    <div class="tab-pane fade" id="payments">
                        @include('site.profile.includes.payments')
                    </div>
{{--                    <div class="tab-pane fade" id="affiliateorders">--}}
{{--                        @include('admin.settings.includes.analytics')--}}
{{--                    </div>--}}

                @endif

            </div>
        </div>
    </div>
@endsection
