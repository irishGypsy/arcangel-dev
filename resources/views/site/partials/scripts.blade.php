<script src="{{ asset('frontend/js/jquery-3.6.js') }}" type="text/javascript"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>--}}

{{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<script src="{{ asset('frontend/plugins/fancybox/fancybox.min.js') }}" type="text/javascript"></script>
{{--<script src="{{ asset('frontend/plugins/owlcarousel/owl.carousel.min.js') }}"></script>--}}
<script src="{{ asset('frontend/js/script.js') }}" type="text/javascript"></script>
{{--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>--}}
{{--<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/engine1/wowslider.js"></script>--}}
{{--<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/bootstrap.js"></script>--}}
{{--<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/wow.js"></script>--}}
<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/elevatezoom.js"></script>
<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/lightslider.js"></script>
<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/smartmenus.js"></script>
<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/smartmenus.bootstrap.js"></script>
<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/range-modernizr.js"></script>
<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/range-slider.js"></script>
<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/star-rating.js"></script>
<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/custom.js"></script>
{{--<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/bootstrap-slider.js"></script>--}}
<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/smoothscroll.js"></script>
<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/lightweightLightbox.min.js"></script>
{{--<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/responsiveCarousel.min.js"></script>--}}
{{--<script type="text/javascript" src="{{ asset('js/globalenhance.js')}}"></script>;--}}
{{--<script type="text/javascript" src="{{ asset('js/responsive-carousel.autoinit.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('js/responsive-carousel.autoplay.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('js/responsive-carousel.js') }}"></script>--}}
<script>
    $(window).scroll(function () {
        if ($(window).scrollTop() > 200) {
            $(".headpanel").addClass('sticky');
        } else {
            $(".headpanel").removeClass('sticky');

        }

    });

@stack('scripts')
