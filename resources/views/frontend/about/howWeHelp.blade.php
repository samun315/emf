@extends('frontend.master')

@section('frontend_title', 'How we help')

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
                            <h2>How We Help?</h2>
                        </div>
                        <div class="border-box"></div>
                        <div class="breadcrumb-menu">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><span class="flaticon-right-arrow"></span></li>
                                <li class="active">How We Help</li>
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
                <div class="col-xl-2"></div>
                <div class="col-xl-8" style="margin-top: 30px;">

                    <h1 class="text-center">HOW WE HELP? <br><br></h1>

                    <ul style="list-style-type:disc !important;">
                        <li style="list-style-type:disc !important;" >M22 Doctors’ Foundation Sponsor, Implement & Monitor all of its charity projects through a selected “Social -Entrepreneur” or “Community Volunteer Group”. <br> <br>
                        </li>
                        <li style="list-style-type:disc !important;" >The selected “Social -Entrepreneur” or “Community Volunteer Group” operate the project accordingly. <br> <br>
                        </li>
                    </ul>

                    <h6 class="text-center"><a href="/all-programs">Please go through our programs</a> <br> & </h6>
                    <h6 class="text-center"><a href="/all-programs">Become a Volunteer</a> <br><br><br> </h6>
                    <div class="text-center">
                        <div class="btn-box">
                            <a class="btn-one" href="/contact-us"><span class="txt"><i class="arrow1 fa fa-check-circle"></i>CONTACT US</span></a>
                        </div>
                    </div>

                    <div class="text-center justify-content-center">
                        <br><br>
                        <a href="/"> <img style="width: 150px; height: 150px" src="http://127.0.0.1:8000/assets/frontend/logo/m22 foundation logo.jpg" alt="logo"></a>
                        <br><br>
                    </div>
                    <h6 class="text-center"><a href="/all-programs">M22 Doctors’ Foundation</a> </h6>




                </div>
            </div>
        </div>
    </section>
    <!--End About Style2 Area-->
@endsection
