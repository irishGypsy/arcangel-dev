<header id="header" class="header-black" style="background-color: #f5f5f5;">
                <div class="d-flex flex-row justify-content-around header-flex log-bt cart_fix" style="height:50px;">
                    <div class="">
                        <div class="cart-fix">
                            <a href="https://www.instagram.com/ArcAngelBatteryLLC/"><i class="fa fa-instagram fa-3x" aria-hidden="true"></i></a>
                            <a href="https://www.facebook.com/Arc-Angel-Battery-172640030326755"><i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
                            <a href="https://www.youtube.com/channel/UCeQC51Knz-gSXvrLdyWRQpA"><i class="fa fa-youtube-square fa-3x" aria-hidden="true"></i></a>

                        </div>

                    </div>
                    <div style="width:200px">
                    </div>
                    <div>
                        <form action="#" method="post">
                            <div class="custom-search-input">
                                <div class="input-group col-md-12">
                                    <input type="text" class="form-control required" placeholder="Search" name="searchbox" required="">
                                    <span class="input-group-btn">
                                        <button class="btn btn-info btn-lg" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <div class="cart_fix">
                            <div class="log_bt d-flex flex-row justify-content-center">
                                @guest
                                <a href="{{ route('login') }}" class="log_btn header-black">Login</a>
                                <span>|</span>
                                <a href="{{ route('register') }}" class="sig_btn header-black">Sign Up</a>
                                <span>|</span>
                                <a href="{{ route('checkout.cart') }}" class="btn btn-primary header-black mr-3" style="width:100px;">
                                    <i class="fa fa-shopping-cart"></i> Cart (0)</a>
{{--                                <span>|</span>--}}
                                @endguest
                                @auth
                                    <a href="{{ route('checkout.cart') }}" class="btn btn-primary header-black mr-3" style="width:100px;">
                                        <i class="fa fa-shopping-cart"></i> Cart ({{ Cart::session(Auth::guard()->user()->id)->getContent()->count() }})
                                    </a>
                                    <span>|</span>
                                    <div class="dropdown pl-3">
                                        <a class="btn btn-primary header-black dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-user pl-3"></i> Profile
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <a href="{{route('site.profile')}}" class="dropdown-item">My Profile</a>
{{--                                                <form action="" method="POST">--}}
                                            <a href="{{route('logout.x')}}" class="dropdown-item">Logout</a>
{{--                                                </form>--}}
                                        </div>
                                    </div>
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>

{{--    @include('site.partials.nav')--}}
</header>

