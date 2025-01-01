@extends('frontend.master')

@section('frontend_title', 'How we spend your money')

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
                            <h2>How we spend your money</h2>
                        </div>
                        <div class="border-box"></div>
                        <div class="breadcrumb-menu">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><span class="flaticon-right-arrow"></span></li>
                                <li class="active">How we spend your money</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->



    <!--Start About Style2 Area-->
    <section class="about-style2-area pd120-0-0">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h3>HOW WE SPEND YOUR MONEY:</h3>

                    <p>Integrity, honesty, and transparency are central to our values as an organization. In fact, they are part of our core values. We’re committed to distribute your contributions among the marginal people of Bangladesh. We spent your money in the following areas: </p>
                    <p>[1] Foundations project development: 90% </p>
                    <p>[2] Fundraising: 05%</p>
                    <p>[3] Administrative & Information technology: 05%</p>
                    <img src="{{asset('assets/images/money-spend.JPG')}}" alt="">
                    <p>• We maintain the highest accountability standard in spending your money.</p>
                    <p>• We try to keep the lowest administrative expenditure.</p>
                    <div style="text-align: center">
                        <p>Do you have a question about our accountability measures?</p>
                        <a href="/contact-us" class="btn-one btn-one-style2">CONTACT US</a>
                        <br>
                        <br>
                        <h3>M22 Doctors’ Foundation</h3>
                        <h5>Updated: 11.03.2024</h5>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End About Style2 Area-->
@endsection
