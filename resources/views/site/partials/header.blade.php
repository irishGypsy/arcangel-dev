<header id="header" style="background-color: #f5f5f5;">
                <div class="d-flex flex-row justify-content-around header-flex log-bt cart_fix" style="height:50px;">
                    <div>
                        <a href="https://www.facebook.com/Arc-Angel-Battery-172640030326755/?modal=admin_todo_tour" class="fa fa-facebook-square fa-2x" target="_blank" style="color: blue;"></a>
                        <a href="https://www.arcangelbattery.com/signup/">Become An Affiliate</a> <span style="font-weight: 700; font-size: 16px;">/</span>
                        <a href="https://www.arcangelbattery.com/affiliate-login/">Affiliate Login</a>
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
                            <div class="log_bt">
                                @guest
                                <a href="{{ route('login') }}" class="log_btn">Login</a>
                                <span>|</span>
                                <a href="{{ route('register') }}" class="sig_btn">Sign Up</a>
                                <span>|</span>
                                @endguest
                                <a href="{{ route('checkout.cart') }}" class="icontext">Cart ({{ $cartCount }})</a>
                                <img src="https://www.arcangelbattery.com/assets/front/images/cart.png" alt="Cart">
                                @auth
                                <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="fa fa-sign-out fa-lg"></i> Logout</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>

    @include('site.partials.nav')
</header>

