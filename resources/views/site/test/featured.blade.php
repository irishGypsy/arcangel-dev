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

                    </div><!-- @end .crsl-wrap -->
                </div><!-- @end .crsl-items -->

            </div><!-- @end #w -->
        </div><!-- close row -->
    </div><!-- close container -->
</div><!-- close main -->
