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
                            <h2>Program Details</h2>
                        </div>
                        <div class="border-box"></div>
                        <div class="breadcrumb-menu">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><span class="flaticon-right-arrow"></span></li>
                                <li class="active">Program Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->

    <!--Start Cause Details Area-->
    <section class="cause-details-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">

                    @include('message')

                    <div class="cause-details_content">
                        <div class="cause-details-image-box">
                            <img src="{{ asset('uploads/programs/' . $program->image) }}" alt="Program">
                            <div class="category">
                                <h6>{{ $program->name }}</h6>
                            </div>
                        </div>

                        <div class="donate-form-box donate-form-box--style2">
                            <div class="top-title">
                                <h2>{{ $program->name }}</h2>
                            </div>

                            <div class="progress-levels progress-levels-style2">
                                <!--Skill Box-->
                                <div class="progress-box wow animated" style="visibility: visible;">

                                </div>
                            </div>

                        </div>

                        <div class="cause-details-text-box-1">
                            <?php echo $program->details ?>
                            {{-- <p> --}}
                                {{-- {!! $program->details !!} --}}
                            {{-- </p> --}}
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="sidebar-content-box">

                        <!--Start Single Sidebar Box-->
                        <div class="single-sidebar-box">
                            <div class="sidebar-campaigns">
                                <div class="title">
                                    <h3>Upcoming Programs</h3>
                                </div>
                                <ul class="recent-campaigns">

                                    @foreach ($programs as $upcoming_program)
                                        @if ($upcoming_program->program_status == 'Upcoming')
                                            <li>
                                                <div class="inner">
                                                    <div class="img-box">
                                                        <img style="width: 85px; height:72px"
                                                            src="{{ asset('uploads/programs/' . $upcoming_program->image) }}"
                                                            alt="upcoming program">
                                                        <div class="overlay-content">
                                                            <a
                                                                href="/program-details?program={{ $upcoming_program->id }}"><i
                                                                    class="fa fa-link" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="title-box">
                                                        <h4>
                                                            <a
                                                                href="/program-details?program={{ $upcoming_program->id }}">{{ $upcoming_program->name }}</a>
                                                        </h4>
                                                        <div class="btns">
                                                            <a
                                                                href="/program-details?program={{ $upcoming_program->id }}">View
                                                                Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
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
    <!--End Cause Details Area-->

    <!-- The Modal -->

@endsection
