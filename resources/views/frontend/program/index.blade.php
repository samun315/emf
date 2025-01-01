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
                            <h2>All Programs</h2>
                        </div>
                        <div class="border-box"></div>
                        <div class="breadcrumb-menu">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><span class="flaticon-right-arrow"></span></li>
                                <li class="active">All Programs</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->

    <!--Start Blog Page One-->
    <section class="blog-page-one">
        <div class="container">

            @include('message')

            <div class="row text-right-rtl">

                @foreach ($results as $row)
                    <div class="col-xl-4 col-lg-4">
                        <div class="single-cause-style1">
                            <div class="img-holder">
                                @if (isset($row->image))
                                    <img style="width: 360px; height:351px"
                                        src="{{ asset('uploads/programs/' . $row->image) }}" alt="Banner Image">
                                @else
                                    <img style="width: 360px; height:351px"
                                        src="assets/frontend/images/causes/causes-v1-1.jpg" alt="Banner Image">
                                @endif

                            </div>
                            <div class="text-holder">
                                <h3>
                                    <a href="/program-details?program={{ $row->id }}">
                                        {{ \Illuminate\Support\Str::limit($row->name, 30) }}
                                    </a>
                                </h3>
                                <p>
                                    {{ \Illuminate\Support\Str::limit(strip_tags($row->details), 80) }}
                                </p>
                                <br>

                                <div class="btns-box">
                                    <a class="btn-one" href="/program-details?program={{ $row->id }}">
                                        <span class="txt">
                                            <i class="arrow1 fa fa-check-circle"></i>
                                            Read More
                                        </span>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <!-- Display pagination links -->
                    {{ $results->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>

    </section>
    <!--End Blog Page One-->

    <!-- The Modal -->

@endsection
