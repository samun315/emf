@extends('frontend.master')

@section('frontend_title', 'Send Us Donation')

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
                            <h2>Send Us Donation</h2>
                        </div>
                        <div class="border-box"></div>
                        <div class="breadcrumb-menu">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><span class="flaticon-right-arrow"></span></li>
                                <li class="active">Send Us Donation</li>
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
                <div class="col-xl-12" style="margin-top: 30px;">
                    <h6 class="text-center">Donate for a Good Cause, Make a small contribution be a part of change
                        <br>Let’s work together to develop a <br><br> <b>"Sustainable Community Welfare"</b></h6>
                </div>
                <div class="col-xl-4"></div>
            </div>
            <div class="row">

                <div class="col-xl-12" style="margin-top: 30px;">

                    <div class="text-center justify-content-center">
                        <a href="/"> <img style="width: 120px; height: 100px" src="/assets/frontend/logo/Picture2.png" alt="logo"></a>
                    </div>
                    <br>
                    <h6 class="text-center">Join Our Mission</h6>

                </div>
            </div>
            <div class="row">
                {{-- <div class="col-md-4"></div> --}}
                <div class="col-xl-12" style="margin-top: 30px;">

                    <h6 class="text-center"><a href="/all-programs">Please go through our programs</a> </h6>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 d-flex justify-content-center" style="margin-top: 30px;">
                    <div class="text-center justify-content-center">
                        <a href="/"> <img style="width: 150px; height: 150px" src="http://127.0.0.1:8000/assets/frontend/logo/m22 foundation logo.jpg" alt="logo"></a>
                    </div>

                </div>
            </div>
            <div class="row">
                {{-- <div class="col-md-4"></div> --}}
                <div class="col-xl-12" style="margin-top: 30px;">

                    <h6 class="text-center"><a href="/contact-us">M22 Doctors’ Foundation</a></h6>

                </div>
            </div>
        </div>
    </section>
    <!--End About Style2 Area-->
@endsection
