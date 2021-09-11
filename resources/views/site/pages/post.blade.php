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
                $(".headpanel").addClass('sticky');
            } else {
                $(".headpanel").removeClass('sticky');
            }
        });
    </script>
</head>

<body>

@include('site.partials.header')
@include('site.partials.nav')

<div class="inner_banner">

    <img class="img-responsive" src="{{ asset('storage/'.$post->image) }}" alt="About Us">
    <div class="about_txt">
        <h2>{{ $post->title }}</h2>
{{--        <small><a href="https://www.arcangelbattery.com/" ?="">Home</a> /<span> About Us</span></small>--}}
    </div>
</div>


<div class="content_area" style="background-color: white;">
    <div class="container">
        <div class="row">

            <div class="col-md-12">

                <div class="about_cntnt">
                    <h1>{{ $post->title }}</h1>

                    <br>

                    {!! $post->body !!}

                    <br><br>

                </div>

            </div>

        </div>
    </div>
</div><!-- content div end -->




@include('site.partials.footer')
</body>
</html>




