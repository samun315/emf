@php

    $programs = \DB::table('programs')
        ->orderBy('id', 'ASC')
        ->get();

    $notices = \DB::table('notices')
        ->orderBy('id', 'DESC')
        ->where('status', 'YES')
        ->get();

@endphp

<header class="main-header header-style-one">

    @include('frontend.layouts.top_header')

    <!--Start Header-->
    <div class="header">
        <div class="container">
            <div class="outer-box clearfix">
                <div class="header-left clearfix pull-left">
                    <div class="logo">
                        <a href="/">
                            <img style="width: 298px; height:74px"
                                src="{{ asset('assets/frontend/logo/logo.svg') }}" alt="Logo"
                                title="">
                        </a>
                    </div>
                </div>

                <div class="header-right pull-right">
                    <div class="nav-outer style1 clearfix">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler">
                            <div class="inner">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </div>
                        </div>
                        <!-- Main Menu -->
                        <nav class="main-menu style1 navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li class="{{ request()->is('/') ? 'current' : '' }}"><a href="/">Home</a>
                                    </li>
                                    {{-- <li class="{{ request()->is('about-us') ? 'current' : '' }}"><a
                                            href="/about-us">About Us</a>
                                    </li> --}}

                                    <li class="dropdown"><a href="javascrip:void(0)">About Us</a>
                                        <ul>
                                            <li><a href="/about-us">About Us</a></li>
                                            <li><a href="/what-makes-us-apart">What Makes us Apart</a></li>
                                            <li><a href="/how-we-spend-your-money">How we spend your money</a></li>
                                            <li><a href="/chairman-message">Message from our Chairman</a></li>
                                            <li><a href="/executive-committee">Executive Committee</a></li>
                                            <li><a href="/our-members">Our Valued Members</a></li>

                                        </ul>
                                    </li>

                                    {{-- <li class="{{ request()->is('project') ? 'current' : '' }}"><a
                                            href="/project">Project</a>
                                    </li> --}}

                                    <li class="dropdown"><a href="javascrip:void(0)">Program</a>
                                        <ul>
                                            <li><a href="/all-programs">All Programs</a></li>
                                            {{-- <li><a href="/project">All Projects</a></li> --}}

                                            @foreach ($programs as $project_category)
                                                <li>
                                                    <a
                                                        href="/project?category={{ $project_category->id }}">{{ $project_category->name }}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </li>

                                    <li class="{{ request()->is('events') ? 'current' : '' }}"><a href="/events">Event</a>
                                        {{-- <ul>
                                            <li><a href="/events">All Event</a></li>

                                            @foreach ($programs as $event_category)
                                                <li>
                                                    <a
                                                        href="/events?category={{ $event_category->id }}">{{ $event_category->name }}</a>
                                                </li>
                                            @endforeach

                                        </ul> --}}
                                    </li>

                                    <li class="{{ request()->is('blog') ? 'current' : '' }}"><a href="/blog">Blog</a>
                                    </li>
                                    <li class="{{ request()->is('gallery') ? 'current' : '' }}"><a
                                            href="/gallery">Gallery</a>
                                    </li>
                                    <li class="{{ request()->is('contact-us') ? 'current' : '' }}"><a
                                            href="{{ route('frontend.contactUs') }}">Contact Us</a>
                                    </li>
                                    {{-- <li><div class="btns-box"><a class="btn-one" href="/member-login">Login</a></div></li> --}}
                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->
                    </div>

                    {{-- <div class="header-right_buttom">
                        <div class="btns-box">
                            <button class="btn-one" data-toggle="modal" data-target="#myModal"><span class="txt"><i
                                        class="arrow1 fa fa-check-circle"></i>Donate Now</span></button>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
    <!--End header-->

    <!--Sticky Header-->
    <div class="sticky-header">
        <div class="container">
            <div class="clearfix">
                <!--Logo-->
                <div class="logo float-left">
                    <a href="/" class="img-responsive">
                        <img style="width: 298px; height:74px"
                            src="{{ asset('assets/frontend/logo/logo.svg') }}" alt=""
                            title=""></a>
                </div>
                <!--Right Col-->
                <div class="right-col float-right">
                    <!-- Main Menu -->
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--End Sticky Header-->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon fa fa-times-circle"></span></div>
        <nav class="menu-box">
            <div class="nav-logo"><a href="index.html"><img style="width: 208px; height:54px"
                        src="{{ asset('assets/frontend/logo/logo.svg') }}" alt=""
                        title=""></a>
            </div>
            <div class="menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
            <!--Social Links-->
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="#"><span class="fab fa fa-facebook-square"></span></a></li>
                    <li><a href="#"><span class="fab fa fa-twitter-square"></span></a></li>
                    <li><a href="#"><span class="fab fa fa-pinterest-square"></span></a></li>
                    <li><a href="#"><span class="fab fa fa-google-plus-square"></span></a></li>
                    <li><a href="#"><span class="fab fa fa-youtube-square"></span></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End Mobile Menu -->
</header>
