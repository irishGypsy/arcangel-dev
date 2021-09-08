<script src="{{ asset('frontend/js/jquery-3.6.js') }}" type="text/javascript"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script src="{{ asset('frontend/plugins/fancybox/fancybox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/js/script.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/elevatezoom.js"></script>
<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/lightslider.js"></script>
<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/smartmenus.js"></script>
<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/smartmenus.bootstrap.js"></script>
<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/range-modernizr.js"></script>
<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/range-slider.js"></script>
<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/star-rating.js"></script>
<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/custom.js"></script>
<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/smoothscroll.js"></script>
<script type="text/javascript" src="https://www.arcangelbattery.com/assets/front/js/lightweightLightbox.min.js"></script>
<script>
    $(window).scroll(function () {
        if ($(window).scrollTop() > 200) {
            $(".headpanel").addClass('sticky');
        } else {
            $(".headpanel").removeClass('sticky');

        }

    });

@stack('scripts')
