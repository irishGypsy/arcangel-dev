<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="{{ asset('frontend/plugins/fancybox/fancybox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/js/script.js') }}" type="text/javascript"></script>
<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
{{--<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/elevatezoom.js"></script>--}}
{{--<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/lightslider.js"></script>--}}
{{--<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/smartmenus.js"></script>--}}
{{--<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/smartmenus.bootstrap.js"></script>--}}
{{--<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/range-modernizr.js"></script>--}}
{{--<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/range-slider.js"></script>--}}
{{--<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/star-rating.js"></script>--}}
{{--<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/custom.js"></script>--}}
{{--<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/smoothscroll.js"></script>--}}
{{--<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/lightweightLightbox.min.js"></script>--}}


{{--<script>--}}

{{--    $(window).scroll(function () {--}}
{{--        if ($(window).scrollTop() > 200) {--}}
{{--            $(".headpanel").addClass('sticky');--}}
{{--        } else {--}}
{{--            $(".headpanel").removeClass('sticky');--}}

{{--        }--}}

{{--    });--}}
{{--</script>--}}

@stack('scripts')
