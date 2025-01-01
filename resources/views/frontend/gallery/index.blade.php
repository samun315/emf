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
                            <h2>Photo Gallery</h2>
                        </div>
                        <div class="border-box"></div>
                        <div class="breadcrumb-menu">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><span class="flaticon-right-arrow"></span></li>
                                <li class="active">Photo Gallery</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->


    <!--Start Blog Page One-->
    {{-- <section class="blog-page-one">
        <div class="container">

        </div>
    </section> --}}

    <section class="blog-page-one">
        <div class="container">
            <div class="portfolio-menu mt-2 mb-4">
                <ul>
                    <li class="btn btn-outline-dark active" data-filter="*">All</li>
                    <li class="btn btn-outline-dark" data-filter=".events">Event Photo</li>
                    <li class="btn btn-outline-dark" data-filter=".projects">Project Photo</li>
                    <li class="btn btn-outline-dark text" data-filter=".programs">Program Photo</li>
                </ul>
            </div>
            <div class="portfolio-item row">

                @foreach ($programs as $program)
                    <div class="item programs col-lg-3 col-md-4 col-6 col-sm">
                        <a href="{{ asset('uploads/programs/' . $program->image) }}" class="fancylight popup-btn"
                            data-fancybox-group="light">

                            <img style="width:263px; height:175px" class="img-fluid"
                                src="{{ asset('uploads/programs/' . $program->image) }}" alt="program">
                        </a>
                        <p class="text-center"> {{ $program->name }} </p>
                    </div>
                @endforeach

                @foreach ($projects as $project)
                    <div class="item projects col-lg-3 col-md-4 col-6 col-sm">
                        <a href="{{ asset('uploads/project_gallery/' . $project->image) }}" class="fancylight popup-btn"
                            data-fancybox-group="light">

                            <img style="width:263px; height:175px" class="img-fluid"
                                src="{{ asset('uploads/project_gallery/' . $project->image) }}" alt="project">
                        </a>
                        <p class="text-center">{{ $project->caption }}</p>
                    </div>
                @endforeach

                @foreach ($events as $event)
                    <div class="item events col-lg-3 col-md-4 col-6 col-sm">
                        <a href="{{ asset('uploads/event/' . $event->banner_img) }}" class="fancylight popup-btn"
                            data-fancybox-group="light">
                            <img style="width:263px; height:175px" class="img-fluid"
                                src="{{ asset('uploads/event/' . $event->banner_img) }}" alt="event">
                        </a>
                        <p class="text-center">{{ $event->title }}</p>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!--End Blog Page One-->
@endsection
