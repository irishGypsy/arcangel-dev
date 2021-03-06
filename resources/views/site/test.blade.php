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
<body>
@include('site.partials.header')
@include('site.test.carousel')
@include('site.test.batteryfinder')
@include('site.test.featured')
@include('site.test.intro')
{{--@yield('content')--}}
@include('site.partials.footer')
</body>
</html>
