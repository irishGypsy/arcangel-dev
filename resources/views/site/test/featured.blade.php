<div class="fetu_pro_main" style="background-color: white;">
    <div class="container">
        <div class="row">
            <div id="w">
                <h2>Featured Products</h2>

{{--                <nav class="slidernav">--}}
{{--                    <div id="navbtns" class="clearfix">--}}
{{--                        <a href="#" class="previous"><i class="fa fa-angle-left" aria-hidden="true"></i></a>--}}
{{--                        <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>--}}
{{--                    </div>--}}
{{--                </nav>--}}

                <div class="crsl-items" data-navigation="navbtns" style="width: 100%; overflow: hidden;">
                    <div class="crsl-wrap" style="width: 1290px; margin-left: -258px;">

                        <div class="crsl-item" style="position: relative; float: left; overflow: hidden; height: 426px; width: 228px; margin-right: 30px;">
                            <div class="thumbnail">
                                <figure>
                                    <img src="{{ asset('storage/'.$products[0]->image) }}"></figure>
                            </div>

                            <h3><a href="https://www.arcangelbattery.com/product/arcangelgroup94rstartingbattery">{{ $products[0]->name }}</a></h3>
                            <p>${{number_format($products[0]->mrp,2,'.',',') }}</p>
                            <p class="readmore"><a href="https://www.arcangelbattery.com/product/arcangelgroup94rstartingbattery">Add To Cart</a></p>
                        </div>


                        @foreach($products as $p)
                        @if($p->id > 0)

                            <div class="crsl-item" style="position: relative; float: left; overflow: hidden; height: 426px; width: 228px; margin-right: 30px;">
                                <div class="thumbnail">
                                    <figure>
                                        <img src="{{ asset('storage/'.$p->image) }}"></figure>
                                </div>

                                <h3><a href="https://www.arcangelbattery.com/product/arcangelgroup94rstartingbattery">{{ $p->name }}</a></h3>
                                <p>${{number_format($p->mrp,2,'.',',') }}</p>
                                <p class="readmore"><a href="https://www.arcangelbattery.com/product/arcangelgroup94rstartingbattery">Add To Cart</a></p>
                            </div>
                        @endif
                        @endforeach

{{--                        <div class="crsl-item crsl-active" style="position: relative; float: left; overflow: hidden; height: 426px; width: 228px; margin-right: 30px;">--}}
{{--                            <div class="thumbnail">--}}
{{--                                <figure>--}}
{{--                                    <img src="https://www.arcangelbattery.com/uploads/product/20180923_130940929685658img1.jpg" alt="20180923_130940929685658img1.jpg"></figure>--}}
{{--                            </div>--}}

{{--                            <h3><a href="https://www.arcangelbattery.com/product/ArcAngelGroup47StartingBattery">Arc-Angel Group 47 Starting Battery - Out Of Stock</a></h3>--}}
{{--                            <p>$820.00</p>--}}
{{--                            <p class="readmore"><a href="https://www.arcangelbattery.com/product/ArcAngelGroup47StartingBattery">Add To Cart</a></p>--}}
{{--                        </div>--}}

{{--                        <!-- post #1 -->--}}

{{--                        <div class="crsl-item" style="position: relative; float: left; overflow: hidden; height: 426px; width: 228px; margin-right: 30px;">--}}
{{--                            <div class="thumbnail">--}}
{{--                                <figure>--}}
{{--                                    <img src="https://www.arcangelbattery.com/uploads/product/20180923_1306121396617136img1.jpg" alt="20180923_1306121396617136img1.jpg"></figure>--}}
{{--                            </div>--}}

{{--                            <h3><a href="https://www.arcangelbattery.com/product/ArcAngelGroup51StartingBattery">Arc-angel Group 51 Starting Battery</a></h3>--}}
{{--                            <p>$380.00</p>--}}
{{--                            <p class="readmore"><a href="https://www.arcangelbattery.com/product/ArcAngelGroup51StartingBattery">Add To Cart</a></p>--}}
{{--                        </div>--}}

{{--                        <!-- post #1 -->--}}

{{--                        <div class="crsl-item" style="position: relative; float: left; overflow: hidden; height: 426px; width: 228px; margin-right: 30px;">--}}
{{--                            <div class="thumbnail">--}}
{{--                                <figure>--}}
{{--                                    <img src="https://www.arcangelbattery.com/uploads/product/20180923_1301391000440701img1.jpg" alt="20180923_1301391000440701img1.jpg"></figure>--}}
{{--                            </div>--}}

{{--                            <h3><a href="https://www.arcangelbattery.com/product/ArcAngelGroup24FStartingBattery">Arc-Angel Group 24F Starting Battery</a></h3>--}}
{{--                            <p>$420.00</p>--}}
{{--                            <p class="readmore"><a href="https://www.arcangelbattery.com/product/ArcAngelGroup24FStartingBattery">Add To Cart</a></p>--}}
{{--                        </div>--}}

{{--                        <!-- post #1 -->--}}

{{--                        <div class="crsl-item" style="position: relative; float: left; overflow: hidden; height: 426px; width: 228px; margin-right: 30px;">--}}
{{--                            <div class="thumbnail">--}}
{{--                                <figure>--}}
{{--                                    <img src="https://www.arcangelbattery.com/uploads/product/20180923_1258311278173479img1.jpg" alt="20180923_1258311278173479img1.jpg"></figure>--}}
{{--                            </div>--}}

{{--                            <h3><a href="https://www.arcangelbattery.com/product/arcangelgroup35startingbattery">Arc-angel Group 35 Starting Battery</a></h3>--}}
{{--                            <p>$416.00</p>--}}
{{--                            <p class="readmore"><a href="https://www.arcangelbattery.com/product/arcangelgroup35startingbattery">Add To Cart</a></p>--}}
{{--                        </div>--}}

                    </div><!-- @end .crsl-wrap -->
                </div><!-- @end .crsl-items -->

            </div><!-- @end #w -->
        </div><!-- close row -->
    </div><!-- close container -->
</div><!-- close main -->
