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
        <h1>Frequently Asked Questions</h1>
    </div>
    <hr style="width:80%;color:#a2a2a2;margin:15px auto;">
    <div class="card" style="width: 70%;margin:0 auto;">
        @foreach($faqs as $f)
            <div class="card-header" id="heading{{ $f->id }}" style="background-color: #131822;margin-bottom:10px;">
                <h5 class="mb-0">
                    <button class="btn btn-link" style="color: #a2a2a2 !important;font-family:FuturaPT-Light;font-size: 19px !important;" data-toggle="collapse" data-target="#collapse{{ $f->id }}" aria-expanded="true" aria-controls="collapse{{ $f->id }}">
                        {{ $f->question }}
                    </button>
                </h5>
            </div>
            <div id="collapse{{ $f->id }}" class="collapse" style="margin-bottom: 10px;" aria-labelledby="heading{{ $f->id }}" data-parent="#accordion">
                <div class="card-body bg-light" style="color:#6b6b6b !important!;font-family:FuturaPT-Light;font-size: 16px !important;">
                    {{ $f->answer }}
                </div>
            </div>
        @endforeach
    </div>
    <br><br>
</div>

@include('site.partials.footer')




