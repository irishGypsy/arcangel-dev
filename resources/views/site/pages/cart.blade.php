@extends('site.app')
@section('title', 'Shopping Cart')
@section('content')

{{--    <div class="content_area cart12" style="background-color: white;">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="about_cntnt mt_lg" id="shw_cart">--}}
{{--                    <h1>Shopping Cart</h1>--}}
{{--                    <div class="col-md-8 cart_desk">--}}
{{--                        <div class="addcartpage">--}}

{{--                            <div style="border-bottom:0px;" class="well well-sm cartit hidden-xs">--}}
{{--                                <div class="col-sm-6 col-xs-12"><h4>ITEM DETAILS</h4></div><!-- end of col -->--}}
{{--                                <div class="col-sm-2 col-xs-12"><h4>QTY</h4></div><!-- end of col -->--}}
{{--                                <div class="col-sm-2 col-xs-12"><h4>PRICE</h4></div><!-- end of col -->--}}
{{--                                <div class="col-sm-2 col-xs-12"><h4>TOTAL</h4></div><!-- end of col -->--}}

{{--                                <div class="cl"></div>--}}
{{--                            </div><!-- end of well -->--}}

{{--                            <ul class="list-unstyled well cartbox">--}}

{{--@foreach($cartcontents as $c)--}}

{{--                                <li class="col-sm-6 col-xs-12">--}}
{{--                                    <div class="cart_lebel">--}}
{{--                                        <h4>ITEM DETAILSxxx</h4>--}}
{{--                                    </div>--}}
{{--                                    <div class="imgbox">--}}
{{--                                        <a href="#">--}}
{{--                                            <img src="{{ asset('storage/'.$c->image) }}" alt="no images">--}}
{{--                                        </a>--}}
{{--                                    </div><!-- end of imgbox -->--}}
{{--                                    <small class="textt">--}}
{{--                                        <a></a><br>--}}
{{--                                        <!--<strong>Seller: </strong>Style King-->--}}

{{--                                        <a class="dlt_img rmv_img">--}}
{{--                                            <span class="dlt_img" style="cursor: pointer;" id="crtDel_8f53295a73878494e9bc8dd6c3c7104f" data_info_crtdel="8f53295a73878494e9bc8dd6c3c7104f"> REMOVE</span></a>--}}

{{--                                    </small>--}}


{{--                                </li><!-- end of col -->--}}

{{--                                <li class="col-sm-2 col-xs-12">--}}
{{--                                    <div class="cart_lebel">--}}
{{--                                        <h4>QTY</h4>--}}
{{--                                    </div>--}}
{{--                                    <div class="pro_detail_adbtn">--}}
{{--                                        <div class="input-group spinner">--}}

{{--                                            <input type="text" readonly="readonly" name="8f53295a73878494e9bc8dd6c3c7104f" value="1" style="width:35px; height:48px; text-align:center;" id="crtQty_8f53295a73878494e9bc8dd6c3c7104f">--}}
{{--                                            <div class="input-group-btn-vertical">--}}
{{--                                                <button class="btn btn-default" type="button" onclick="return plusQty8f53295a73878494e9bc8dd6c3c7104f();"><i class="fa fa-plus"></i></button>--}}
{{--                                                <button class="btn btn-default" type="button" onclick="return minusQty8f53295a73878494e9bc8dd6c3c7104f();"><i class="fa fa-minus"></i></button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="cl"></div>--}}
{{--                                    <input style="margin-top: 4px;" type="submit" name="qyup" value="Update" id="crtUpd_8f53295a73878494e9bc8dd6c3c7104f" data_info_crtupd="8f53295a73878494e9bc8dd6c3c7104f" class="btn btn-default btn-sm f_left">--}}

{{--                                </li><!-- end of col -->--}}
{{--                                <li class="col-sm-2 col-xs-12">--}}
{{--                                    <div class="cart_lebel">--}}
{{--                                        <h4>Price</h4>--}}
{{--                                    </div>--}}
{{--                                    <h4><small class="hidden visible-xs"> (Price) </small>$ 420.00 </h4>--}}
{{--                                </li><!-- end of col -->--}}
{{--                                <li class="col-sm-2 col-xs-12">--}}
{{--                                    <div class="cart_lebel">--}}
{{--                                        <h4>Total</h4>--}}
{{--                                    </div>--}}
{{--                                    <h4><small class="hidden visible-xs"> (Total) </small> $ 420.00  </h4>--}}
{{--                                </li><!-- end of col -->--}}
{{--                                <div class="cl"></div><!-- end of clear -->--}}
{{--                            </ul><!-- end of well -->--}}


{{--                            <div class="clear"></div><!-- end of clear -->--}}
{{--                            <br>--}}
{{--                        </div>--}}
{{--                    </div>--}}



{{--                    <div class="col-md-8 cart_mob">--}}
{{--                        <div class="addcartpage">--}}
{{--                            <div class="table table-responsive">--}}
{{--                                <table class="table table-bordered ">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th style="width: 52%;">ITEM DETAILS</th>--}}
{{--                                        <th style="width: 16%;">QTY</th>--}}
{{--                                        <th style="width: 16%;">PRICE</th>--}}
{{--                                        <th style="width: 16%;">TOTAL</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <!--Qnty update-->--}}
{{--                                    <script>--}}
{{--                                        function plusQty8f53295a73878494e9bc8dd6c3c7104f()--}}
{{--                                        {--}}
{{--                                            var qty = $('#crtQty_8f53295a73878494e9bc8dd6c3c7104f').val();--}}
{{--                                            var aval = 3;--}}
{{--                                            if(qty >= aval)--}}
{{--                                            {--}}
{{--                                                return false;--}}
{{--                                            }--}}
{{--                                            else--}}
{{--                                            {--}}
{{--                                                $('#crtQty_8f53295a73878494e9bc8dd6c3c7104f').val( parseInt($('#crtQty_8f53295a73878494e9bc8dd6c3c7104f').val()) + 1);--}}
{{--                                            }--}}
{{--                                        }--}}
{{--                                        function minusQty8f53295a73878494e9bc8dd6c3c7104f()--}}
{{--                                        {--}}
{{--                                            var qty = $('#crtQty_8f53295a73878494e9bc8dd6c3c7104f').val();--}}
{{--                                            var aval = 3;--}}
{{--                                            if(qty <= '1' )--}}
{{--                                            {--}}
{{--                                                return false;--}}
{{--                                            }--}}
{{--                                            else--}}
{{--                                            {--}}
{{--                                                $('#crtQty_8f53295a73878494e9bc8dd6c3c7104f').val( parseInt($('#crtQty_8f53295a73878494e9bc8dd6c3c7104f').val()) - 1);--}}
{{--                                            }--}}
{{--                                        }--}}
{{--                                    </script>--}}
{{--                                    <!--end qty update-->--}}
{{--                                    <script type="text/javascript">--}}
{{--                                        $(document).ready(function(){--}}

{{--                                            $("#crtUpd_8f53295a73878494e9bc8dd6c3c7104f").click(function(){--}}
{{--                                                var cart_id = $("#crtUpd_8f53295a73878494e9bc8dd6c3c7104f").attr('data_info_crtUpd');--}}
{{--                                                var qty = $("#crtQty_8f53295a73878494e9bc8dd6c3c7104f").val();--}}
{{--                                                var product_id = 179;--}}
{{--                                                //alert(qty);return false;--}}
{{--                                                $.ajax({--}}
{{--                                                    url: "https://www.arcangelbattery.com/ajxcart",--}}
{{--                                                    data:{cart_id:cart_id,cart_qty:qty,cart_type:'update',product_id:product_id},--}}
{{--                                                    method:'post',--}}
{{--                                                    //beforeSend: function() {--}}
{{--                                                    //$("#ajaxloader").fadeIn();--}}
{{--                                                    //},--}}
{{--                                                    success: function(result){--}}
{{--                                                        //$("#ajaxloader").fadeOut(300);--}}
{{--                                                        $("#shw_cart").html(result);--}}

{{--                                                    }});--}}

{{--                                            });--}}
{{--                                        });--}}
{{--                                    </script>--}}
{{--                                    <script type="text/javascript">--}}
{{--                                        $(document).ready(function(){--}}
{{--                                            $("#crtDel_8f53295a73878494e9bc8dd6c3c7104f").click(function(){--}}
{{--                                                var cart_id = $("#crtDel_8f53295a73878494e9bc8dd6c3c7104f").attr('data_info_crtDel');--}}
{{--                                                //alert(cart_id);return false;--}}
{{--                                                $.ajax({--}}
{{--                                                    url: "https://www.arcangelbattery.com/ajxcart",--}}
{{--                                                    data:{cart_id:cart_id,cart_type:'delete'},--}}
{{--                                                    method:'post',--}}
{{--                                                    //beforeSend: function() {--}}
{{--                                                    //$("#ajaxloader").fadeIn();--}}
{{--                                                    //},--}}
{{--                                                    success: function(result){--}}
{{--                                                        //var ppp=1;--}}
{{--                                                        //$("#crtpt").html(0);--}}
{{--                                                        //$("#ajaxloader").fadeOut(300);--}}
{{--                                                        $("#shw_cart").html(result);--}}
{{--                                                    }});--}}

{{--                                            });--}}
{{--                                        });--}}
{{--                                    </script>--}}
{{--                                    <!--- End javascript-->--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            <div class="cart_lebel">--}}
{{--                                                <h4>ITEM DETAILS</h4></div>--}}
{{--                                            <div class="imgbox">--}}
{{--                                                <a href="#">--}}
{{--                                                    <img src="https://www.arcangelbattery.com/uploads/product/20180923_1301391000440701img1.jpg" alt="no images">--}}
{{--                                                </a>--}}
{{--                                            </div><!-- end of imgbox -->--}}
{{--                                            <small class="textt">--}}
{{--                                                <a>--}}
{{--                                                    Arc-Angel Group 24F Starting Battery     </a><br>--}}
{{--                                                <!--<strong>Seller: </strong>Style King-->--}}

{{--                                                <a class="dlt_img rmv_img">--}}
{{--                                                    <span class="dlt_img" style="cursor: pointer;" id="crtDel_8f53295a73878494e9bc8dd6c3c7104f" data_info_crtdel="8f53295a73878494e9bc8dd6c3c7104f"> REMOVE</span></a>--}}

{{--                                            </small>--}}


{{--                                            <!-- end of col --></td>--}}
{{--                                        <td>--}}
{{--                                            <div class="cart_lebel">--}}
{{--                                                <h4>QTY</h4></div>--}}
{{--                                            <div class="pro_detail_adbtn">--}}
{{--                                                <div class="input-group spinner mmt">--}}
{{--                                                    <input type="text" name="8f53295a73878494e9bc8dd6c3c7104f" value="1" style="width:35px; height:48px; text-align:center;" id="crtQty_8f53295a73878494e9bc8dd6c3c7104f">--}}
{{--                                                    <div class="input-group-btn-vertical">--}}
{{--                                                        <button class="btn btn-default" type="button" onclick="return plusQty8f53295a73878494e9bc8dd6c3c7104f();"><i class="fa fa-plus"></i></button>--}}
{{--                                                        <button class="btn btn-default" type="button" onclick="return minusQty8f53295a73878494e9bc8dd6c3c7104f();"><i class="fa fa-minus"></i></button>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="cl"></div>--}}
{{--                                            <input style="margin-top: 4px;" type="submit" name="qyup" value="Update" id="crtUpd_8f53295a73878494e9bc8dd6c3c7104f" data_info_crtupd="8f53295a73878494e9bc8dd6c3c7104f" class="btn btn-default btn-sm">--}}
{{--                                            <!-- end of col --></td>--}}
{{--                                        <td>--}}
{{--                                            <div class="cart_lebel">--}}
{{--                                                <h4>PRICE</h4></div>--}}
{{--                                            <h4>$ 420.00 </h4>--}}
{{--                                            <!-- end of col -->--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <div class="cart_lebel">--}}
{{--                                                <h4>TOTAL</h4></div>--}}
{{--                                            <h4>$ 420.00  </h4>--}}
{{--                                            <!-- end of col --></td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}




{{--                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 total_otr pd_n">--}}
{{--                        <div class="totalbox">--}}
{{--                            <div class="panel">--}}
{{--                                <div class="panel-body">--}}
{{--                                    <h3><span>Sub Total</span> <strong>$ 420.00</strong></h3>--}}
{{--                                    <!--h3><span>Shipping Charges</span> <strong> </strong></h3-->--}}
{{--                                    <div class="grd_total">--}}
{{--                                        <h3><span class="finl_prc">Grand Total <small>(inclusive of all taxes)</small></span> <strong class="finl_prc"> $ 420.00</strong></h3>--}}
{{--                                    </div>--}}
{{--                                </div><!-- end of boty -->--}}

{{--                            </div><!-- end of panel -->--}}
{{--                        </div><!-- end of totalbox -->--}}
{{--                    </div>--}}
{{--                    <!--script coupon code-->--}}
{{--                    <script>--}}
{{--                        function applycoupon()--}}
{{--                        {--}}
{{--                            // alert('ok');--}}
{{--                            var coupon_code = $("#coupon_code").val();--}}
{{--                            if (coupon_code == null || coupon_code == "") {--}}
{{--                                document.getElementById("coupon_code").focus();--}}
{{--                                return false;--}}
{{--                            }--}}
{{--                            //alert(coupon_code);--}}
{{--                            $.ajax({--}}
{{--                                url: "https://www.arcangelbattery.com/ajxcart",--}}
{{--                                data:{coupon_code:coupon_code,cart_type:'coupon_code'},--}}
{{--                                method:'post',--}}
{{--                                //beforeSend: function() {--}}
{{--                                //$("#ajaxloader").fadeIn();--}}
{{--                                //},--}}
{{--                                success: function(result){//alert(coupon_code);return false;--}}
{{--                                    //$("#ajaxloader").fadeOut(300);--}}
{{--                                    $("#shw_cart").html(result);--}}
{{--                                }});--}}
{{--                        }--}}
{{--                    </script>--}}
{{--                    <!--end-->--}}
{{--                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">--}}
{{--                        <div class="cart-block-wrapper">--}}
{{--                            <div class="cart-block block">--}}
{{--                                <form id="discount-coupon-form" action="" method="post">--}}
{{--                                    <div class="discount">--}}
{{--                                        <div class="block-title">--}}
{{--                                            <strong>Apply Coupon Code</strong>--}}
{{--                                        </div>--}}
{{--                                        <div class="discount-form">--}}
{{--                                            <label for="coupon_code">Enter Coupon Code</label>--}}
{{--                                            <div class="cl"></div>--}}
{{--                                            <input type="hidden" name="remove" id="remove-coupone" value="0">--}}
{{--                                            <div class="input-box">--}}
{{--                                                <input class="form-control input-text" id="coupon_code" name="coupon_code" value="">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="buttons-set">--}}
{{--                                            <button type="button" title="Apply Coupon" class="btn cpn_btn" onclick="applycoupon();" value="Apply Coupon">--}}
{{--                                <span>--}}
{{--                                    <span>Apply Coupon</span>--}}
{{--                                </span>--}}
{{--                                            </button>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </form>--}}
{{--                                <div class="cl"></div>--}}
{{--                            </div>--}}
{{--                            <div class="cl"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-4 col-md-4 col-sm-12 chk_btn">--}}
{{--                        <div class="chk_out">--}}
{{--                            <a href="https://www.arcangelbattery.com/" class="btn btn-warning btn-sm ">Continue Shopping</a>--}}
{{--                            <a href="https://www.arcangelbattery.com/checkout" type="button" class="btn btn-scs btn-sm">Checkout </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                    <div class="cl"></div>--}}
{{--                </div><!--sub cat-->--}}
{{--                <div class="cl"></div>--}}

{{--            </div><!--row end-->--}}
{{--        </div>--}}

{{--    </div>--}}


    <section class="section-pagetop bg-dark" style="background-color: white; border-style:solid;">
        <div class="container clearfix">
            <h2 class="title-page">Shopping Cart</h2>
        </div>
    </section>
    <section class="section-content bg padding-y border-top" style="background-color: white;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @if (Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <main class="col-sm-9">
                    @if (\Cart::isEmpty())
                        <p class="alert alert-warning">Your shopping cart is empty.</p>
                    @else
                        <div class="card">
                            <table class="table table-bordered table-hover shopping-cart-wrap" style="font-family: FuturaPT-Light;font-size: large;">
                                <thead class="text-muted">
                                <tr style="background-color: #f2f2f2;">
                                    <th scope="col" style="text-align: center;">Item Details</th>
                                    <th scope="col" width="120" style="text-align: center;">Quantity</th>
                                    <th scope="col" width="120" style="text-align: center;">Price</th>
                                    <th scope="col" width="120" style="text-align: center;">Subtotal</th>
                                    <th scope="col" style="text-align:center;" width="200">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\Cart::getContent() as $item)
                                    <tr style="text-align: center;">
                                        <td style="text-align: center;">
                                            <figure class="media">
                                                <figcaption class="media-body">
                                                    <p class="title text-truncate">{{ Str::words($item->name,20) }}</p>
                                                    @foreach($item->attributes as $key  => $value)
                                                        <dl class="dlist-inline small">
                                                            <dt>{{ ucwords($key) }}: </dt>
                                                            <dd>{{ ucwords($value) }}</dd>
                                                        </dl>
                                                    @endforeach
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td style="text-align: center;">
                                            <p class="price">{{ $item->quantity }}</p>
                                        </td>
                                        <td style="text-align: center;">
                                            <div class="price-wrap">
                                                <p class="price">${{ config('settings.currency_symbol'). number_format($item->price,2,'.',',') }}  each</p>
                                            </div>
                                        </td>
                                        <td style="text-align: center;">
                                            <div class="price-new">
                                                <p class="price">
                                                    ${{ number_format(($item->price * $item->quantity),2,'.',',') }}

                                                </p>

                                            </div>

                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('checkout.cart.remove', $item->id) }}" class="btn btn-outline-danger"><i class="fa fa-times"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </main>
                <aside class="col-sm-3">
                    <a href="{{ route('checkout.cart.clear') }}" class="btn btn-danger btn-block mb-4">Clear Cart</a>
                    <p class="alert alert-success">Add USD 5.00 of eligible items to your order to qualify for FREE Shipping. </p>
                    <dl class="dlist-align h4">
                        <dt>Total:</dt>
                        <dd class="text-right"><strong>{{ config('settings.currency_symbol') }}{{ \Cart::getSubTotal() }}</strong></dd>
                    </dl>
                    <hr>
                    <figure class="itemside mb-3">
                        <aside class="aside"><img src="{{ asset('frontend/images/icons/pay-visa.png') }}"></aside>
                        <div class="text-wrap small text-muted">
                            Pay 84.78 AED ( Save 14.97 AED ) By using ADCB Cards
                        </div>
                    </figure>
                    <figure class="itemside mb-3">
                        <aside class="aside"> <img src="{{ asset('frontend/images/icons/pay-mastercard.png') }}"> </aside>
                        <div class="text-wrap small text-muted">
                            Pay by MasterCard and Save 40%.
                            <br> Lorem ipsum dolor
                        </div>
                    </figure>
                    <a href="{{ route('checkout.index') }}" class="btn btn-success btn-lg btn-block">Proceed To Checkout</a>
                </aside>
            </div>
        </div>
        <br><br>
    </section>
@stop
