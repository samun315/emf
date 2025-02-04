@extends('frontend.master')

@section('frontend_title', 'Become a Volunteer')

@section('frontend_main_content')


    <!--Start breadcrumb area-->
    <section class="breadcrumb-area" style="background-image: url(assets/frontend/images/breadcrumb/breadcrumb-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content text-center">
                        <div class="parallax-scene parallax-scene-1">
                            <div data-depth="0.20" class="parallax-layer shape wow zoomInRight" data-wow-duration="2000ms">
                                <div class="shape1">
                                    <img class="float-bob" src="assets/frontend/images/shape/breadcrumb-shape1.png"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="parallax-scene parallax-scene-1">
                            <div data-depth="0.20" class="parallax-layer shape wow zoomInRight" data-wow-duration="2000ms">
                                <div class="shape2">
                                    <img class="zoominout" src="assets/frontend/images/shape/breadcrumb-shape2.png"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="title">
                            <h2>Become a Volunteer</h2>
                        </div>
                        <div class="border-box"></div>
                        <div class="breadcrumb-menu">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><span class="flaticon-right-arrow"></span></li>
                                <li class="active">Become a Volunteer</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->



    <!--Start About Style2 Area-->
    <section class="about-style2-area bg-white">
        <div class="container">
            <div class="row">
                <div class="col-xl-12" style="margin-top: 45px;">
                    <h6 class="text-center">Volunteering offers numerous benefits. It provides a sense of accomplishment and purpose,<br>
                        enhancing mental health and overall well-being. Additionally,<br>
                        it fosters a strong sense of community and belonging.
                        </h6>
                </div>
                <div class="col-xl-4"></div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-xl-12">
                    <div class="features-style1_box">
                        <div class="thm-shape1 wow slideInRight" data-wow-delay="0ms" data-wow-duration="3500ms">
                            <img class="rotate-me" src="assets/frontend/images/shape/thm-shape-1.png" alt="">
                        </div>
                        <div class="row">
                            <div class="col-xl-1 col-lg-1"> </div>
                            <!--Start Features Style1 Single-->
                            <div class="col-xl-4 col-lg-4 text-center" data-aos="fade-up" data-aos-easing="linear"
                                data-aos-duration="500">
                                <div class="features-style1_single">
                                    <div class="icon-holder">
                                        <div class="inner">
                                            <img src="assets/frontend/images/icon/features/feature-v2-2.png" alt="">
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
                                        <h3>Become a Fundraising Volunteer</h3>
                                        <p>Support your local community by helping raise funds for the Engineer Moqbul Foundation (EMF).</p>

                                    </div>
                                </div>
                            </div>
                            <!--End Features Style1 Single-->
                            <div class="col-xl-2 col-lg-2"> </div>
                            <!--Start Features Style1 Single-->
                            <div class="col-xl-4 col-lg-4 text-center" data-aos="fade-up" data-aos-easing="linear"
                                data-aos-duration="600">
                                <div class="features-style1_single style2">
                                    <div class="icon-holder">
                                        <div class="inner">
                                            <img src="assets/frontend/images/icon/features/feature-v2-3.png" alt="">
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
                                        <h3>Become a Project Organizer for the Needy</h3>
                                        <p>Let us know how we can assist your community.</p>

                                    </div>
                                </div>
                            </div>
                            <!--End Features Style1 Single-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- <div class="col-md-4"></div> --}}
                <div class="col-xl-12" style="margin-top: 30px;">

                    <h6 class="text-center"><a href="/all-programs">Please go through our programs</a> </h6>

                </div>
            </div>
            <div class="row">
                {{-- <div class="col-md-4"></div> --}}
                <div class="col-xl-12" style="margin-top: 50px;">

                    <h6 class="text-center">Join the <a href="/contact-us">Engineer Moqbul Foundation (EMF)</a> in implementing projects through our Community Volunteers’ Group.</h6>

                </div>
            </div>
        </div>
    </section>
    <!--End About Style2 Area-->
@endsection
