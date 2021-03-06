<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Arc-Angel Batteries LLC</title>
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
@include('site.partials.carousel')
@include('site.partials.batteryfinder')
@include('site.partials.featured')
@include('site.partials.intro')
@include('site.partials.footer')
</body>
</html>
