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
                            <h2>Latest Blogs</h2>
                        </div>
                        <div class="border-box"></div>
                        <div class="breadcrumb-menu">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><span class="flaticon-right-arrow"></span></li>
                                <li class="active">Latest Blogs</li>
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
            <div class="row">

                @foreach ($results as $row)

                    <?php $blog_detail = strip_tags($row->details);
                    $blog_details = \Illuminate\Support\Str::limit($blog_detail, 200); ?>

                    <div class="col-lg-4">
                        <div class="single-blog-style1 wow fadeInUp" data-wow-duration="1500ms">
                            <div class="img-holder">
                                <div class="inner">
                                    <img style="width: 360px; height:300px"
                                        src="{{ asset('uploads/blog/' . $row->banner_img) }}" alt="image">
                                    <div class="overlay-icon">
                                        <a href="{{ route('frontend.blogDetails', $row->id) }}"><span
                                                class="flaticon-plus"></span></a>
                                    </div>
                                </div>
                                <div class="date-box">
                                    <h2>{{ date('d', strtotime($row->created_at)) }}</h2>
                                    <p>{{ date('M', strtotime($row->created_at)) }}</p>
                                </div>
                            </div>
                            <div class="text-holder">
                                <h3 class="blog-title">
                                    <a href="{{ route('frontend.blogDetails', $row->id) }}">
                                        {{ \Illuminate\Support\Str::limit($row->title, 30) }}
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
            <div class="row">
                <div class="col-xl-12">
                    <!-- Display pagination links -->
                    {{ $results->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>

        </div>
    </section>
    <!--End Blog Page One-->
@endsection
