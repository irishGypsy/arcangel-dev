
<div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:80%;margin:0 auto;">
    <ol class="carousel-indicators">

        @foreach($banners as $a)
            @if($loop->first)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="active"></li>
            @else
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

            @endif
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach($banners as $b)
            @if($loop->first)
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('storage/'.$b->image) }}" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>{{ $b->title }}</h3>
                        <h4>{{ $b->description }}</h4>
                    </div>
                </div>
            @else
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('storage/'.$b->image) }}" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>{{ $b->title }}</h3>
                        <h4>{{ $b->description }}</h4>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
        <a class="carousel-control-prev left" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next right" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
</div>
<br><br>
{{--<div class="banner_main">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                <div class="banner">--}}
{{--                    <div class="carousel slide" data-ride="carousel" id="myCarousel">--}}
{{--                        <div class="carousel-inner">--}}
{{--                            @foreach($banners as $b)--}}
{{--                                @if($loop->first)--}}
{{--                                    <div class="item active">--}}
{{--                                        <img src="{{ asset('storage/'.$b->image) }}" alt="{{ $b->description }}" >--}}
{{--                                        <div class="carousel-caption">--}}
{{--                                            <h3>{{$b->title}}</h3>--}}
{{--                                            <p>{{$b->description}}</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @else--}}
{{--                                    <div class="item">--}}
{{--                                        <img src="{{ asset('storage/'.$b->image) }}" alt="{{ $b->description }}" >--}}
{{--                                        <div class="carousel-caption">--}}
{{--                                            <h3>{{$b->title}}</h3>--}}
{{--                                            <p>{{$b->description}}</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                        <!-- Controls -->--}}
{{--                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">--}}
{{--                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>--}}
{{--                            <span class="sr-only">Previous</span>--}}
{{--                        </a>--}}
{{--                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">--}}
{{--                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>--}}
{{--                            <span class="sr-only">Next</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--</div>--}}


{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>--}}
<script type="text/javascript">
    $(document).ready(function() {
        $('#myCarousel').carousel()
        // Enable Carousel Controls
        $(".left").click(function(){
            $("#myCarousel").carousel("prev");
        });
        $(".right").click(function(){
            $("#myCarousel").carousel("next");
        });
    });
</script>
