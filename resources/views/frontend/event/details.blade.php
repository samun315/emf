@extends('frontend.master')

@section('frontend_main_content')
    <!--Start breadcrumb area-->
    <section class="breadcrumb-area" style="background-image: url(/assets/frontend/images/breadcrumb/breadcrumb-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content text-center">
                        <div class="parallax-scene parallax-scene-1">
                            <div data-depth="0.20" class="parallax-layer shape wow zoomInRight" data-wow-duration="2000ms">
                                <div class="shape1">
                                    <img class="float-bob"
                                        src="{{ asset('assets/frontend/images/shape/breadcrumb-shape1.png') }}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="parallax-scene parallax-scene-1">
                            <div data-depth="0.20" class="parallax-layer shape wow zoomInRight" data-wow-duration="2000ms">
                                <div class="shape2">
                                    <img class="zoominout"
                                        src="{{ asset('assets/frontend/images/shape/breadcrumb-shape2.png') }}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="title">
                            <h2>Event Details</h2>
                        </div>
                        <div class="border-box"></div>
                        <div class="breadcrumb-menu">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><span class="flaticon-right-arrow"></span></li>
                                <li class="active">Event Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->

    <!--Start Cause Details Area-->
    {{-- <section class="blog-details-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="blog-details-content">

                        <div class="single-blog-style1 single-blog-style2 wow fadeInUp" data-wow-duration="1500ms">
                            <div class="img-holder">
                                <img src="{{ asset('uploads/event/' . $event->banner_img) }}" alt="">
                            </div>
                            <div class="text-holder">
                                <h3 class="blog-title">
                                    {{ $event->title }}
                                </h3>
                                <div class="meta-box">
                                    <ul class="meta-info">
                                        <li><i class="fa fa-calendar" aria-hidden="true"></i>
                                            <a href="javascript:void(0)">
                                                {{ date('F j, Y', strtotime($event->date)) }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="text">
                                    <p>
                                        {!! $event->details !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--End Cause Details Area-->

    <section class="event-details-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="event-details_content">

                        <div class="event-details-image-box">
                            <img src="{{ asset('uploads/event/' . $event->banner_img) }}" alt="">
                            <div class="category">
                                <h6>{{ $event->project_title }}</h6>
                            </div>
                        </div>

                        <div class="event-details-text-box">
                            <h2>{{ $event->title }}</h2>
                            <ul class="event-info">

                                <li>
                                    <div class="icon">
                                        <img src="assets/frontend/images/icon/date-1.png" alt="">
                                        <div class="overlay-icon">
                                            <img src="assets/images/icon/date-1-bg.png" alt="">
                                        </div>
                                    </div>
                                    <div class="text">
                                        <p>Event Date</p>
                                        <h3> {{ date('F d, Y', strtotime($event->date)) }}</h3>
                                    </div>
                                </li>
                                <li></li>
                                <li>
                                    <div class="icon">
                                        <img src="assets/frontend/images/icon/map-marker-1.png" alt="">
                                        <div class="overlay-icon">
                                            <img src="assets/images/icon/map-marker-1-bg.png" alt="">
                                        </div>
                                    </div>
                                    <div class="text">
                                        <p>Event Location</p>
                                        <h3> {{ $event->location }}</h3>
                                    </div>
                                </li>

                            </ul>
                        </div>

                        <div class="cause-details-text-box-1">
                            <p>
                                {!! $event->details !!}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="sidebar-content-box">
                        <!--Start Single Sidebar Box-->
                        <div class="single-sidebar-box">
                            <div class="sidebar-campaigns">
                                <div class="title">
                                    <h3>Upcoming Events</h3>
                                </div>
                                <ul class="recent-campaigns">

                                    @foreach ($upcoming_events as $upcoming_event)
                                        <li>
                                            <div class="inner">
                                                <div class="img-box">
                                                    <img style="width: 85px; height:72px"
                                                        src="{{ asset('uploads/event/' . $upcoming_event->banner_img) }}"
                                                        alt="upcoming event">
                                                    <div class="overlay-content">
                                                        <a href="/event-details?upcoming-event={{ $upcoming_event->id }}"><i
                                                                class="fa fa-link" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                                <div class="title-box">
                                                    <h4><a href="/event-details?upcoming-event={{ $upcoming_event->id }}">
                                                            {{ $upcoming_event->title }}
                                                        </a></h4>
                                                    <div class="btns">
                                                        <a href="/event-details?upcoming-event={{ $upcoming_event->id }}">View
                                                            Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!--End Single Sidebar Box-->

                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
