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
                    <h6 class="text-center">Being a volunteer has lots of benefits. <br>
                        Volunteer works give us a sense of achievement and purpose, <br>
                        thereby improve mental health and sense of wellbeing. <br>
                        It helps us feel part of a community.
                        </h6>
                </div>
                <div class="col-xl-4"></div>
            </div>
            <div class="row">
                <div class="col-md-6 d-flex justify-content-center" style="margin-top: 45px;">
                    <div class="text-center justify-content-center">
                        <div class="circle2 text-center">
                            <div>
                                <h5>BECOME A FUNDRAISING <br> VOLUNTEER:</h5>
                                <p>Help, raise money for M22 Doctors’ Foundation in your local community</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center" style="margin-top: 45px;">
                    <div class="text-center justify-content-center">
                        <div class="circle2 text-center">
                            <div>
                                <h5>BECOME A PROJECT ORGANIZER <br> FOR THE NEEDY</h5>
                                <p>Inform us any help we can do at your locality</p>
                            </div>

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

                    <h6 class="text-center">CONTACT US to become a volunteer
                        <a href="/contact-us">M22 Doctors’ Foundation</a> implement projects though a
                        Community Volunteers’ Group
                        </h6>

                </div>
            </div>
        </div>
    </section>
    <!--End About Style2 Area-->
@endsection
