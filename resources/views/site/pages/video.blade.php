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
    {{--    @include('site.partials.header')--}}

</head>
<body style="background-color:#333333">
@include('site.partials.header')
@include('site.partials.nav')

<div id="accordion" style="background-color: white;">
    <br>
    <div class="container" style="width:100%;background-color: white;margin-top:10px;font-family:FuturaPT-Book;font-size:28px;">
        <h1>Videos</h1>
    </div>
    <hr style="width:80%;color:#a2a2a2;margin:15px auto;">

    <div class="border-light d-flex flex-column" style="margin: 0 auto;">

    @foreach($videos as $v)

    <div class="border border-dark rounded my-lg-2 bg-light d-flex flex-row justify-content-between" style="width:70%; margin:0 auto;">
        <div class="border-dark p-10 m-lg-3 mr-md-3">
{{--            @if($v->file == null)--}}
                <a href="{{ $v->url }}" data-toggle="lightbox">
                    <img src="{{ asset('storage/'.$v->thumbnail) }}" width="300px">
                </a>
{{--            @else--}}
{{--                <a href="{{ asset('storage/'. $v->file) }}" data-toggle="lightbox">--}}
{{--                    <img src="{{ asset('storage/'.$v->thumbnail) }}" width="300px">--}}
{{--                </a>--}}
{{--            @endif--}}
{{--                <img src="{{ asset('storage/'.$v->thumbnail) }}" width="300px">--}}
{{--            </a>--}}
        </div>
        <div class="border-dark d-flex flex-column">
            <div class="border-dark mr-lg-5 mt-3 d-flex flex-row justify-content-between">
                <h2>{{ $v->title }}</h2>
            </div>
            <div class="border-dark d-flex flex-row justify-content-lg-start">
                <p>Video by: {{ $v->creator }}</p>
                <div style="width:30px;"></div>
                <p>Length: {{ $v->length }}</p>
                <div style="width:30px;"></div>
                <p>{{ $v->post_date }}</p>
            </div>
            <div class="border-dark">
                <p>{{ $v->subtitle }}</p>
            </div>
            <div class="border-dark" style="width:100%;margin:0 auto 0 0;">
                <p>{!! $v->description !!}</p>
            </div>

        </div>
        <div class="d-flex flex-column justify-content-start p-lg-2">
            <h3>{{ $v->host_site }}</h3>
        </div>
    </div>

        @endforeach
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha512-Velp0ebMKjcd9RiCoaHhLXkR1sFoCCWXNp6w4zj1hfMifYB5441C+sKeBl/T/Ka6NjBiRfBBQRaQq65ekYz3UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
    });
</script>
@include('site.partials.footer')
