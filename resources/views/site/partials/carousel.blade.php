
<div class="banner_main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner">
                    <div class="carousel slide" data-ride="carousel" id="myCarousel">
                        <div class="carousel-inner">
                            @foreach($banners as $b)
                                @if($loop->first)
                                    <div class="item active">
                                        <img src="{{ asset('storage/'.$b->image) }}" alt="{{ $b->description }}" >
                                        <div class="carousel-caption">
                                            <h3>{{$b->title}}</h3>
                                            <p>{{$b->description}}</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="item">
                                        <img src="{{ asset('storage/'.$b->image) }}" alt="{{ $b->description }}" >
                                        <div class="carousel-caption">
                                            <h3>{{$b->title}}</h3>
                                            <p>{{$b->description}}</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#myCarousel').carousel()
        // Enable Carousel Controls
        $(".left").click(function(){
            $("#myCarousel").carousel("prev");
        });
        $(".right").click(function(){
            $("#myCarousel").carousel("next");
        });
    };
</script>
