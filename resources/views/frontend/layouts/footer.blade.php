@php
    $projects = \DB::table('projects')
        ->orderBy('id', 'DESC')
        ->where('status', 'YES')
        ->take(5)
        ->get();

    $events = \DB::table('events')
        ->orderBy('id', 'DESC')
        ->where('status', 'YES')
        ->take(5)
        ->get();

    $footer_setting = \DB::table('footer_settings')->first();

    $contact_us_setting = \DB::table('contact_us_settings')->first();

@endphp

<footer class="footer-area">
    <!--Start Footer-->
    <div class="footer">
        <div class="auto-container">
            <div class="row text-right-rtl">
                <!--Start single footer widget-->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 wow animated fadeInUp" data-wow-delay="0.1s">
                    <div class="single-footer-widget">
                        <div class="our-company-info">
                            <div class="footer-logo">
                                <a href="/"> <img style="width: 200px; height: 200px"
                                        src="{{ asset('assets/frontend/logo/EMF-Final-Logo-footer.png') }}"
                                        alt="logo" /></a>
                            </div>

                            <div class="footer-contact-info"><div class="btns-box"><a class="btn-one" style="color: white" data-toggle="modal" data-target="#myModal">Donate Now</a></div></div>
                            {{-- <div class="footer-contact-info">
                                <div class="icon">
                                    <span class="flaticon-phone-call"></span>
                                </div>
                                <div class="support-box">
                                    <h5>Support:

                                        @if (isset($footer_setting->phone_number))
                                            <a
                                                href="tel:{{ $footer_setting->phone_number }}">{{ $footer_setting->phone_number }}</a>
                                        @endif
                                    </h5>
                                    <div class="email">
                                        <p>
                                            @if (isset($footer_setting->email))
                                                <a href="mailto:{{ $footer_setting->email }}">Email:
                                                    {{ $footer_setting->email }}
                                                </a>
                                            @endif

                                        </p>
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
                <!--End single footer widget-->

                <!--Start single footer widget-->
                <div class="col-xl-3 col-lg-4 col-md-3 col-sm-12 wow animated fadeInUp" data-wow-delay="0.3s">
                    <div class="single-footer-widget martop pd40-0">
                        <div class="title">
                            <h3>  Address</h3>
                            <div class="text-box">

                                @if (isset($contact_us_setting->office_address))
                                    <p style="color: rgb(252, 252, 252)">
                                        <span class="flaticon-maps-and-flags"></span>
                                     {{ $contact_us_setting->office_address }}</p>
                                @endif

                            </div>

                        </div>

                    </div>
                </div>
                <!--End single footer widget-->

                <!--Start single footer widget-->
                <div class="col-xl-3 col-lg-4 col-md-3 col-sm-12 wow animated fadeInUp" data-wow-delay="0.5s">
                    <div class="single-footer-widget martop">
                        <div class="title">
                            <h3>Quick Access</h3>
                        </div>
                        <ul class="footer-widget-links1">
                            <li><a href="/privacy-policy">Privacy Policy</a></li>
                            <li><a href="/resolution">Resolution</a></li>
                            <li><a href="/faq">FAQ</a></li>
                            <li><a href="/disclaimer">Disclaimer</a></li>

                        </ul>
                    </div>
                </div>
                <!--End single footer widget-->
                <!--Start single footer widget-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 wow animated fadeInUp" data-wow-delay="0.5s">
                    <div class="single-footer-widget martop pdtop40">
                        <div class="title">
                            <h3>Contact Us</h3>
                            <p style="color: white"> <span class="flaticon-phone-call-1"></span> {{ $contact_us_setting->support_phone }}</p>
                            <p  style="color: white"><span class="flaticon-opened"></span> {{ $contact_us_setting->support_email }}</p>
                        </div>

                    </div>
                </div>
                <!--End single footer widget-->
                <!--Start single footer widget-->
                {{-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 wow animated fadeInUp" data-wow-delay="0.7s">
                    <div class="single-footer-widget fixwidth martop pdtop40">
                        <div class="title">
                            <h3>Subscribe</h3>
                        </div>
                        <div class="text">
                            <p>Be the first one to receive latest updates.</p>
                        </div>
                        <form action="index.html" method="post" class="widget-subscribe-form">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Enter your email" required="">
                                <button class="submit"><i class="flaticon-opened"></i></button>
                            </div>
                        </form>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!--End Footer-->

    <!--Start Footer Bottom-->
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="footer-bottom_content_box text-center">
                <div class="copyright-text">
                    <p>&copy; {{ date('Y') }} <a href="javascript::void(0)">Engineer Moqbul Foundation.</a> All rights reserved.
                    </p>
                </div>
                <div class="footer-social-link">
                    <ul class="social-links-style1">

                        @if (isset($footer_setting->twitter_link))
                            <li>

                                <a target="_blank" href="{{ $footer_setting->twitter_link }}"><i class="fa fa-twitter"
                                        aria-hidden="true"></i></a>
                            </li>
                        @endif

                        @if (isset($footer_setting->facebook_link))
                            <li>
                                <a target="_blank" href="{{ $footer_setting->facebook_link }}"><i
                                        class="fa fa-facebook" aria-hidden="true"></i></a>
                            </li>
                        @endif

                        @if (isset($footer_setting->linkedin_link))
                            <li>
                                <a target="_blank" href="{{ $footer_setting->linkedin_link }}"><i
                                        class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </li>
                        @endif

                        @if (isset($footer_setting->youtube_link))
                            <li>
                                <a target="_blank" href="{{ $footer_setting->youtube_link }}"><i class="fa fa-youtube"
                                        aria-hidden="true"></i></a>
                            </li>
                        @endif

                        @if (isset($footer_setting->instagram_link))
                            <li>
                                <a target="_blank" href="{{ $footer_setting->instagram_link }}"><i
                                        class="fa fa-instagram" aria-hidden="true"></i></a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--End Footer Bottom-->
</footer>
