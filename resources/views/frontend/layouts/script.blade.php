<script src="{{ asset('assets/frontend/js/jquery.js') }}"></script>
<script src="{{ asset('assets/frontend/js/aos.js') }}"></script>
<script src="{{ asset('assets/frontend/js/appear.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/isotope.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.bxslider.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.countTo.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.enllax.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.paroller.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.polyglot.language.switcher.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jQuery.style.switcher.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/frontend/js/knob.js') }}"></script>
<script src="{{ asset('assets/frontend/js/map-script.js') }}"></script>
<script src="{{ asset('assets/frontend/js/owl.js') }}"></script>
<script src="{{ asset('assets/frontend/js/pagenav.js') }}"></script>
<script src="{{ asset('assets/frontend/js/parallax.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/scrollbar.js') }}"></script>
<script src="{{ asset('assets/frontend/js/slick.js') }}"></script>
<script src="{{ asset('assets/frontend/js/timePicker.js') }}"></script>
<script src="{{ asset('assets/frontend/js/validation.js') }}"></script>
<script src="{{ asset('assets/frontend/js/wow.js') }}"></script>
<script src="{{ asset('assets/frontend/js/TweenMax.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery-sidebar-content.js') }}"></script>

<!-- thm custom script -->
<script src="{{ asset('assets/frontend/js/custom.js') }}"></script>

<!-- For Gallery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>

<script>
    $('.portfolio-menu ul li').click(function() {
        $('.portfolio-menu ul li').removeClass('active');
        $(this).addClass('active');

        var selector = $(this).attr('data-filter');
        $('.portfolio-item').isotope({
            filter: selector
        });
        return false;
    });
    $(document).ready(function() {
        var popup_btn = $('.popup-btn');
        popup_btn.magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    });
</script>
@yield('frontend_page_scripts')
