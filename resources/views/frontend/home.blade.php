@extends('frontend.master')

@section('frontend_title', 'Home')

@section('frontend_main_content')

    <!-- Start Main Slider -->
    @include('frontend.layouts.slider')
    <!-- End Main Slider -->

    <!--Start Features Style1 Area-->
    <section class="features-style1-area">

        <div class="container">
            <div class="sec-title text-center">
                <div class="sub-title">
                    <div class="inner">
                        <h3>We Change Your Life & World</h3>
                    </div>
                </div>
                <h2>Charity With Difference</h2>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="features-style1_box">
                        <div class="thm-shape1 wow slideInRight" data-wow-delay="0ms" data-wow-duration="3500ms">
                            <img class="rotate-me" src="assets/frontend/images/shape/thm-shape-1.png" alt="">
                        </div>
                        <div class="row">
                            <!--Start Features Style1 Single-->
                            <div class="col-xl-4 col-lg-4 text-center" data-aos="fade-up" data-aos-easing="linear"
                                data-aos-duration="500">
                                <div class="features-style1_single">
                                    <div class="icon-holder">
                                        <div class="inner">
                                            <img src="assets/frontend/images/icon/features/help-removebg-preview.png"
                                                alt="">
                                        </div>
                                        <div class="shape1 zoominout">
                                            <img src="assets/frontend/images/icon/features/shape-1.png" alt="">
                                        </div>
                                        {{-- <div class="shape-bg">
                                            <img src="assets/frontend/images/icon/features/feature-v1-1-bg.png"
                                                alt="">
                                        </div> --}}
                                    </div>
                                    <div class="text-holder">
                                        <h3>Inspire And Help</h3>
                                        <p>To donate money is not only the charity, ................
                                        </p>
                                        <div class="btns-box">
                                            <a class="btn-one" href="/inspire-and-help"><span class="txt"><i
                                                        class="arrow1 fa fa-check-circle"></i>read more</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Features Style1 Single-->

                            <!--Start Features Style1 Single-->
                            <div class="col-xl-4 col-lg-4 text-center" data-aos="fade-up" data-aos-easing="linear"
                                data-aos-duration="600">
                                <div class="features-style1_single style2">
                                    <div class="icon-holder">
                                        <div class="inner">
                                            <img src="assets/frontend/images/icon/features/donation-removebg-preview.png"
                                                alt="">
                                        </div>
                                        <div class="shape1 zoominout">
                                            <img src="assets/frontend/images/icon/features/shape-1.png" alt="">
                                        </div>
                                        {{-- <div class="shape-bg">
                                            <img src="assets/frontend/images/icon/features/feature-v1-2-bg.png"
                                                alt="">
                                        </div> --}}
                                    </div>
                                    <div class="text-holder">
                                        <h3>Send Your Donations</h3>
                                        <p>Donate for a good cause, make a small contribution, be a part of change………
                                        </p>
                                        <div class="btns-box">
                                            <a class="btn-one" href="/send-us-donation"><span class="txt"><i
                                                        class="arrow1 fa fa-check-circle"></i>read more</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Features Style1 Single-->

                            <!--Start Features Style1 Single-->
                            <div class="col-xl-4 col-lg-4 text-center" data-aos="fade-up" data-aos-easing="linear"
                                data-aos-duration="500">
                                <div class="features-style1_single style3">
                                    <div class="icon-holder">
                                        <div class="inner">
                                            <img src="assets/frontend/images/icon/features/feature-v2-4.png" alt="">
                                        </div>
                                        <div class="shape1 zoominout">
                                            <img src="assets/frontend/images/icon/features/shape-1.png" alt="">
                                        </div>
                                        {{-- <div class="shape-bg">
                                            <img src="assets/frontend/images/icon/features/feature-v1-3-bg.png"
                                                alt="">
                                        </div> --}}
                                    </div>
                                    <div class="text-holder">
                                        <h3>Become A Volunteer</h3>
                                        <p>Volunteer works give us a sense of achievement and purpose, thereby improve
                                            mental health and sense…
                                        </p>
                                        <div class="btns-box">
                                            <a class="btn-one" href="/become-volunteer"><span class="txt"><i
                                                        class="arrow1 fa fa-check-circle"></i>read more</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Features Style1 Single-->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--End Features Style1 Area-->


    <!--Start Causes Style1 Area-->
    @if (isset($featured_project))
        <section class="causes-style1-area">
            <div class="causes-style1-area_bg"
                style="background-image: url(assets/frontend/images/pattern/thm-pattern-1.png);">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="causes-style1_image-box">
                            <div class="shape wow slideInLeft" data-wow-delay="0ms" data-wow-duration="3500ms">
                                <img class="zoom-fade" src="assets/frontend/images/shape/thm-shape-7.png" alt="">
                            </div>
                            <div class="causes-style1_image2">
                                <img src="assets/frontend/images/resources/causes-style1_image-2.jpg" alt="">
                            </div>
                            <div class="main">
                                <img style="width: 430px; height:430px"
                                    src="{{ asset('uploads/project/' . $featured_project->banner_img) }}" alt="">
                            </div>
                            <div class="causes-style1_image3">
                                <img src="assets/frontend/images/resources/causes-style1_image-3.jpg" alt="">
                            </div>
                            <div class="causes-style1_image4">
                                <img src="assets/frontend/images/resources/causes-style1_image-4.jpg" alt="">
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="causes-style1_content-box">
                            <div class="sec-title">
                                <div class="sub-title martop0">
                                    <div class="inner">
                                        <h3>Help With Featured Cause</h3>
                                    </div>
                                </div>
                                <h2> {{ $featured_project->title }}</h2>
                            </div>
                            <div class="inner-content">
                                <div class="text-box">
                                    <p>
                                        {{ \Illuminate\Support\Str::limit(strip_tags($featured_project->details), 200) }}
                                    </p>
                                </div>

                                <div class="progress-levels">
                                    <!--Skill Box-->
                                    <div class="progress-box wow">
                                        <?php
                                        $budget = $featured_project->budget; // Total budget
                                        $achieved = $featured_project->achieved; // Achieved amount

                                        // Calculate percentage
                                        if ($budget > 0) {
                                            $percentage = ($achieved / $budget) * 100;
                                        } else {
                                            $percentage = 0; // Avoid division by zero
                                        }

                                        // Round the percentage to 2 decimal places
                                        $percentage = round($percentage, 2);

                                        ?>
                                        <div class="inner count-box">
                                            <div class="bar">
                                                <div class="bar-innner">
                                                    <div class="bar-fill" data-percent="{{ $percentage }}" title="Book"></div>
                                                </div>
                                                <div class="text">Achieved:
                                                    {{ number_format($featured_project->achieved, 2) }}</div>
                                                <div class="text">Target:
                                                    {{ number_format($featured_project->budget, 2) }}</div>
                                            </div>

                                            <div class="skill-percent">
                                                <span class="count-text"
                                                    data-speed="3000"data-stop="{{ $percentage }}">{{ $percentage }}</span>
                                                <span class="percent">%</span>
                                                {{-- <span class="outer-text">Pledged So Far</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="btns-box">
                                    <button class="btn-one" data-toggle="modal" data-target="#myModal">
                                        <span class="txt"><i class="arrow1 fa fa-check-circle"></i>Donate
                                            Now</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--End Causes Style1 Area-->

    <!--START UPCOMING PROJECTS-->
    <section class="cause-style2-area">
        <div class="thm-shape1 float-bob"><img src="assets/frontend/images/shape/thm-shape-2.png" alt=""></div>
        <div class="thm-shape2 zoom-fade"><img src="assets/frontend/images/shape/thm-shape-3.png" alt=""></div>
        <div class="auto-container">
            <div class="sec-title text-center">
                <div class="sub-title">
                    <div class="inner">
                        <h3>We Change Your Life & World</h3>
                    </div>
                </div>
                <h2>UPCOMING PROJECTS</h2>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="theme_carousel cause2-carousel owl-dot-style1 owl-theme owl-carousel"
                        data-options='{"loop": true, "margin": 40, "autoheight":true, "lazyload":true, "nav": false, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "1" } , "992":{ "items" : "2" }, "1200":{ "items" : "3" }}}'>

                        @foreach ($upcoming_projects as $project)
                            <div class="single-cause-style1">
                                <div class="img-holder">
                                    <img style="width: 380px; height:370px"
                                        src="{{ asset('uploads/project/' . $project->banner_img) }}" alt="project">
                                </div>
                                <div class="text-holder">
                                    <h3>
                                        <a href="/project-details?project={{ $project->id }}">{{ $project->title }}</a>
                                    </h3>
                                    <p>
                                        {{ \Illuminate\Support\Str::limit(strip_tags($project->details), 50) }}
                                    </p>

                                    <div class="progress-levels progress-levels-style2">
                                        <!--Skill Box-->
                                        <div class="progress-box wow">
                                            <?php
                                            $budget = $project->budget; // Total budget
                                            $achieved = $project->achieved; // Achieved amount

                                            // Calculate percentage
                                            if ($budget > 0) {
                                                $percentage = ($achieved / $budget) * 100;
                                            } else {
                                                $percentage = 0; // Avoid division by zero
                                            }

                                            // Round the percentage to 2 decimal places
                                            $percentage = round($percentage, 2);

                                            ?>
                                            <div class="inner count-box">
                                                <div class="bar">
                                                    <div class="bar-innner">
                                                        <div class="bar-fill" data-percent="{{ $percentage }}"
                                                            title="Book">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bottom-box">
                                                    <div class="rate-box">
                                                        <p>Achieved<span>BDT {{ $project->achieved }}</span></p>
                                                        <p>Target<span>BDT {{ $project->budget }}</span></p>
                                                    </div>

                                                    <div class="skill-percent">
                                                        <span class="count-text" data-speed="3000"
                                                            data-stop="{{ $percentage }}">{{ $percentage }}</span>
                                                        <span class="percent">%</span>
                                                        <p class="outer-text">Achieved So Far</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btns-box">
                                        <button class="btn-one" data-toggle="modal" data-target="#myModal"><span
                                                class="txt"><i class="arrow1 fa fa-check-circle"></i>Donate
                                                Now</span></button>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--END UPCOMING PROJECTS-->

    <!--START UPCOMING EVENTS-->
    <section class="cause-style2-area">
        <div class="thm-shape1 float-bob"><img src="assets/frontend/images/shape/thm-shape-2.png" alt=""></div>
        <div class="thm-shape2 zoom-fade"><img src="assets/frontend/images/shape/thm-shape-3.png" alt=""></div>
        <div class="auto-container">
            <div class="sec-title text-center">
                <div class="sub-title">
                    <div class="inner">
                        <h3>We Change Your Life & World</h3>
                    </div>

                </div>
                <h2>UPCOMING EVENTS</h2>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="theme_carousel cause2-carousel owl-dot-style1 owl-theme owl-carousel"
                        data-options='{"loop": true, "margin": 40, "autoheight":true, "lazyload":true, "nav": false, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "1" } , "992":{ "items" : "2" }, "1200":{ "items" : "3" }}}'>
                        @foreach ($events as $event)
                            <div class="single-blog-style1 wow fadeInUp" data-wow-duration="1500ms">
                                <div class="img-holder">
                                    <div class="inner">
                                        <img style="width: 360px; height:300px"
                                            src="{{ asset('uploads/event/' . $event->banner_img) }}" alt="event image">
                                        <div class="overlay-icon">
                                            <a href="/event-details?event={{ $event->id }}"><span
                                                    class="flaticon-plus"></span></a>
                                        </div>
                                    </div>
                                    <div class="date-box">
                                        <h2>{{ date('d', strtotime($event->date)) }}</h2>
                                        <p>{{ date('M', strtotime($event->date)) }}</p>
                                    </div>
                                </div>
                                <div class="text-holder">
                                    <h3 class="blog-title">
                                        <a href="/event-details?event={{ $event->id }}">
                                            {{ \Illuminate\Support\Str::limit($event->title, 30) }}
                                        </a>
                                    </h3>
                                    <div class="text">
                                        <p>
                                            {{ \Illuminate\Support\Str::limit(strip_tags($event->details), 80) }}
                                        </p>
                                    </div>

                                    <hr>
                                    <div class="text-center">
                                        <div class="event-time">
                                            <div class="text">
                                                <p>{{ $event->location }}</p>
                                            </div>
                                        </div>

                                        <div class="btns-box">
                                            <a class="btn-one" href="/event-details?event={{ $event->id }}">
                                                <span class="txt"><i class="arrow1 fa fa-check-circle"></i>read
                                                    more</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--END UPCOMING EVENTS-->

    <!--Start mission and goals Area-->
    <section class="mission-and-goals-area">
        <div class="container">
            <div class="sec-title text-center">
                <div class="sub-title">
                    <div class="inner">
                        <h3>We Change Your Life & World</h3>
                    </div>
                </div>
                <h2>Our Mission & Goals</h2>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="mission-goals-content clearfix">
                        <div class="thm-shape1 wow slideInRight" data-wow-delay="0ms" data-wow-duration="3500ms">
                            <img class="rotate-me" src="assets/frontend/images/shape/thm-shape-1.png" alt="">
                        </div>
                        <div class="thm-shape2"><img src="assets/frontend/images/shape/thm-shape-5.png" alt="">
                        </div>

                        @if (isset($mission_vision->image))
                            <div class="mission-goals-image-box"
                                style="background-image: url({{ asset('uploads/mission_vision/' . $mission_vision->image) }});">
                            </div>
                        @endif

                        <div class="text-holder">
                            <div class="top">
                                <div class="icon">
                                    <img src="assets/frontend/images/shape/thm-shape-4.png" alt="">
                                </div>
                                <div class="title">
                                    <h3>
                                        @if (isset($mission_vision->title))
                                            {{ $mission_vision->title }}
                                        @endif
                                    </h3>
                                </div>
                            </div>
                            <div class="text">
                                <p>
                                    @if (isset($mission_vision->description))
                                        {!! $mission_vision->description !!}
                                    @endif
                                </p>
                            </div>
                            <ul class="clearfix">
                                <li>
                                    <div class="icon">
                                        <span class="flaticon-house-insurance"></span>
                                        <div class="shape"><img
                                                src="assets/frontend/images/shape/mission-goal-shape-1.png"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="title">
                                        <h3>Home Shelter</h3>
                                    </div>
                                </li>
                                <li class="style2">
                                    <div class="icon">
                                        <span class="flaticon-water"></span>
                                        <div class="shape"><img
                                                src="assets/frontend/images/shape/mission-goal-shape-2.png"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="title">
                                        <h3>Water And Food</h3>
                                    </div>
                                </li>
                                <li class="style3">
                                    <div class="icon">
                                        <span class="flaticon-world"></span>
                                        <div class="shape"><img
                                                src="assets/frontend/images/shape/mission-goal-shape-3.png"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="title">
                                        <h3>Health And Education</h3>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!--End mission and goals Area-->


    <!--Start Donate Form Area-->
    <section class="donate-form-area">
        <div class="donate-form-area_bg" style="background-image: url(assets/frontend/images/pattern/thm-pattern-5.png);">
        </div>
        <div class="auto-container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="donate-form_box">
                        <div class="title">
                            <h2>Quick Donate</h2>
                            <p>Be a community of diverse people</p>
                        </div>
                        <div class="donate-form">

                            <div method="post" action="#" class="donate-form-1">
                                <ul class="clearfix">
                                    <li class="select-box left">
                                        {{-- <select class="selectpicker" name="donation">
                                            <option value="*">On Time Donation</option>
                                            <option value=".category-1">On Time Donation 01</option>
                                            <option value=".category-2">On Time Donation 02</option>
                                            <option value=".category-3">On Time Donation 03</option>
                                            <option value=".category-4">On Time Donation 04</option>
                                            <option value=".category-5">On Time Donation 05</option>
                                        </select> --}}
                                    </li>
                                    <li class="select-box">
                                        {{-- <select class="selectpicker" name="amount">
                                            <option value="*">Amount $</option>
                                            <option value=".category-1">100$</option>
                                            <option value=".category-2">200$</option>
                                            <option value=".category-3">500$</option>
                                            <option value=".category-4">1000$</option>
                                            <option value=".category-5">5000$</option>
                                        </select> --}}
                                    </li>
                                    <li class="select-box right">
                                        {{-- <select class="selectpicker" name="subject">
                                            <option value="*">Funds Type</option>
                                            <option value=".category-1">Funds Type 01</option>
                                            <option value=".category-2">Funds Type 02</option>
                                            <option value=".category-3">Funds Type 03</option>
                                            <option value=".category-4">Funds Type 04</option>
                                            <option value=".category-5">Funds Type 05</option>
                                        </select> --}}
                                    </li>
                                </ul>

                                <div class="button-box">
                                    <button class="btn-one btn-one-style2" data-toggle="modal" data-target="#myModal">
                                        <span class="txt"><i class="arrow1 fa fa-check-circle"></i>donate
                                            now</span>
                                    </button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Donate Form Area-->



    <!--Start Team Style1 Area-->
    <section class="team-style1-area">
        <div class="container">
            <div class="sec-title text-center">
                <div class="sub-title">
                    <div class="inner">
                        <h3>We Change Your Life & World</h3>
                    </div>
                </div>
                <h2>Meet Our Volunteers</h2>
            </div>

            <div class="row">

                @foreach ($volunteers as $volunteer)
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="single-team-style1">
                            <div class="img-holder">
                                <div class="inner">
                                    <img style="width: 263px; height:263px"
                                        src="{{ asset('uploads/volunteer/' . $volunteer->image) }}"
                                        alt="{{ $volunteer->name }}" />
                                    <div class="icon">
                                        <span class=""></span>
                                    </div>
                                </div>

                                <div class="shape"><img src="assets/frontend/images/shape/thm-shape-4.png"
                                        alt="">
                                </div>
                            </div>
                            <div class="title-holder text-center">
                                <h3><a href="javascript:void(0)">{{ $volunteer->name }}</a></h3>
                                <p>{{ $volunteer->designation }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--End Team Style1 Area-->

    <!--Start events Style1 Area-->
    <section class="event-style1-area">
        <div class="custom-container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="event-style1_image-box"
                        style="background-image: url(assets/frontend/images/events/event-details-1.jpg);">

                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="event-style1_content-box">
                        <div class="sec-title">
                            <div class="sub-title martop0">
                                <div class="inner">
                                    <h3>Help With Featured Cause</h3>
                                </div>
                            </div>
                            <h2>Join Upcoming Events</h2>
                        </div>

                        <div class="inner-content">
                            <div class="event-style1-carousel owl-carousel owl-theme owl-nav-style-one">

                                @foreach ($events as $event)
                                    <div class="single-event-style1">
                                        <div class="date-box">
                                            <div class="left">
                                                <h2>{{ date('d', strtotime($event->date)) }}</h2>
                                            </div>
                                            <div class="right">
                                                <h3>{{ date('M', strtotime($event->date)) }}</h3>
                                            </div>
                                        </div>
                                        <div class="meta-info">
                                            <p>Organized By: <a href="#">M22 Charity</a></p>
                                        </div>
                                        <div class="title">
                                            <h2>
                                                <a href="/event-details?event={{ $event->id }}">
                                                    {{ $event->title }}
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="border-box"></div>
                                        <div class="event-time">
                                            <div class="icon">
                                                <span class="flaticon-clock"></span>
                                            </div>
                                            <div class="text">
                                                <p>{{ $event->location }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End events Style1 Area-->

    <!--Start Testimonial style1 Area-->
    <section class="testimonial-style1-area">
        <div class="testimonial-style1-area_bg"
            style="background-image: url(assets/frontend/images/pattern/thm-pattern-1.png);"></div>
        <div class="container">
            <div class="testimonial-style1-content">
                <div class="testimonial-style1_carousel owl-carousel owl-theme">

                    @foreach ($quotes as $quote)
                        <div class="single-testimonial-style1">
                            <div class="img-holder">
                                <div class="inner">
                                    @if (isset($quote->author_image))
                                        <img style="width: 140px; height:140px; border-radius:50%"
                                            src="{{ asset('uploads/quote/' . $quote->author_image) }}" alt="quote">
                                    @else
                                        <img src="assets/frontend/images/testimonial/testimonial-v1-1.png" alt="quote">
                                    @endif
                                </div>
                            </div>
                            <div class="text-holder">
                                <div class="quote">
                                    <span class="flaticon-right-quotes-symbol"></span>
                                </div>
                                <div class="text">
                                    <h3>{{ $quote->title }}</h3>
                                    <p>
                                        {!! $quote->details !!}
                                    </p>
                                </div>
                                <div class="client-info">
                                    <h4>{{ $quote->author_name }}</h4>
                                    <span>{{ $quote->author_address }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>

            </div>
        </div>
    </section>
    <!--End Testimonial Style1 Area-->


    <!--Start Blog Style1 Area-->
    <section class="blog-style1-area">
        <div class="thm-shape1 float-bob"><img src="assets/frontend/images/shape/thm-shape-2.png" alt=""></div>
        <div class="container">
            <div class="sec-title text-center">
                <div class="sub-title">
                    <div class="inner">
                        <h3>We Change Your Life &amp; World</h3>
                    </div>
                </div>
                <h2>News & Happenings</h2>
            </div>
            <div class="row text-right-rtl">

                @foreach ($blogs as $blog)
                    <?php $blog_detail = strip_tags($blog->details);
                    $blog_details = \Illuminate\Support\Str::limit($blog_detail, 200); ?>

                    <div class="col-xl-4 col-lg-4">
                        <div class="single-blog-style1 wow fadeInUp" data-wow-duration="1500ms">
                            <div class="img-holder">
                                <div class="inner">
                                    <img style="width: 360px; height:300px"
                                        src="{{ asset('uploads/blog/' . $blog->banner_img) }}" alt="">
                                    <div class="overlay-icon">
                                        <a href="{{ route('frontend.blogDetails', $blog->id) }}"><span
                                                class="flaticon-plus"></span></a>
                                    </div>
                                </div>
                                <div class="date-box">
                                    <h2>{{ date('d', strtotime($blog->date)) }}</h2>
                                    <p>{{ date('M', strtotime($blog->date)) }}</p>
                                </div>
                            </div>
                            <div class="text-holder">
                                <h3 class="blog-title">
                                    <a href="{{ route('frontend.blogDetails', $blog->id) }}">
                                        {{ $blog->title }}
                                    </a>
                                </h3>
                                <div class="text">
                                    <p>
                                        {{ $blog_details }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--End Blog Style1 Area-->

    <!--Start Our Partner Organization-->
    <section class="blog-style1-area">
        <div class="thm-shape1 float-bob"><img src="assets/frontend/images/shape/thm-shape-2.png" alt=""></div>
        <div class="container">
            <div class="sec-title text-center">
                <div class="sub-title">
                    <div class="inner">
                        <h3>We Change Your Life &amp; World</h3>
                    </div>
                </div>
                <h2>Our Partner Organization</h2>
            </div>

            <ul class="partner-box partner-carousel owl-carousel owl-theme owl-dot-style1">

                @foreach ($partners as $partner_organization)
                    @if ($partner_organization->partner_type == 'Partner Organization')
                        <li class="single-partner-logo-box">
                            <a href="javascript:void(0)"><img style="width: 250px; height:130px"
                                    src="{{ asset('uploads/partner/' . $partner_organization->image) }}"
                                    alt="Partner Logo"></a>
                        </li>
                    @endif
                @endforeach

            </ul>

        </div>
    </section>
    <!--End Our Partner Organization-->


    <!--Start Our Sponsor-->
    <section class="blog-style1-area">
        <div class="thm-shape1 float-bob"><img src="assets/frontend/images/shape/thm-shape-2.png" alt=""></div>
        <div class="container">
            <div class="sec-title text-center">
                <div class="sub-title">
                    <div class="inner">
                        <h3>We Change Your Life &amp; World</h3>
                    </div>
                </div>
                <h2>Our Valued Sponsor</h2>
            </div>
        </div>
    </section>
    <!--End Our Sponsor-->

    <!--Start Partner Area-->
    <section class="partner-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="top-box">
                        <div class="shape wow zoomIn" data-wow-delay="0ms" data-wow-duration="3500ms">
                            <img class="zoom-fade" src="assets/frontend/images/shape/thm-shape-8.png" alt="">
                        </div>
                        <div class="title">
                            <h2>Become Support Partner</h2>
                            <h4>Provide financing support to help individuals build livelihoods</h4>
                        </div>
                        <div class="btn-box">
                            <a class="btn-one" href="/contact-us"><span class="txt"><i
                                        class="arrow1 fa fa-check-circle"></i>get in touch</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="partner-box partner-carousel owl-carousel owl-theme owl-dot-style1">

                @foreach ($partners as $partner)
                    @if ($partner->partner_type == 'Valued Sponsor')
                        <li class="single-partner-logo-box">
                            <a href="javascript:void(0)"><img style="width: 250px; height:130px"
                                    src="{{ asset('uploads/partner/' . $partner->image) }}" alt="Partner Logo"></a>
                        </li>
                    @endif
                @endforeach

            </ul>
        </div>
    </section>
    <!--End Partner Area-->

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Donate Now</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form action="{{ route('frontend.projectDonationRequestStore') }}" method="POST">

                    @csrf

                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="project_or_program_name" class="form-label">Select Project/Program Name<span
                                    class="text-danger">*</span>
                            </label>
                            <select name="project_or_program_name" required id="" class="form-control">
                                <option value="">--Select Project/Program Name--</option>

                                @foreach ($projects as $project)
                                    <option value="project_{{ $project->id }}">{{ $project->title }}
                                    </option>
                                @endforeach

                                @foreach ($programs as $program)
                                    <option value="program_{{ $program->id }}">{{ $program->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                            <input type="text" required class="form-control" name="name" placeholder="Enter name">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email">
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number <span
                                    class="text-danger">*</span></label>
                            <input type="text" required class="form-control" name="phone_number"
                                placeholder="Enter phone number">
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" placeholder="Enter Message" name="message" rows="3"></textarea>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
