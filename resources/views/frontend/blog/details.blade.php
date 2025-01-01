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
                            <h2>Blog Details</h2>
                        </div>
                        <div class="border-box"></div>
                        <div class="breadcrumb-menu">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><span class="flaticon-right-arrow"></span></li>
                                <li class="active">Blog Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->

    <!--Start Cause Details Area-->
    <section class="blog-details-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="blog-details-content">

                        <div class="single-blog-style1 single-blog-style2 wow fadeInUp" data-wow-duration="1500ms">
                            <div class="img-holder">
                                <img src="{{ asset('uploads/blog/' . $blog_details->banner_img) }}" alt="">
                            </div>
                            <div class="text-holder">
                                {{-- <div class="categories">
                                    <h6> {{ $blog_details->category_name }} </h6>
                                </div> --}}
                                <h3 class="blog-title"> {{ $blog_details->title }}
                                </h3>
                                <div class="meta-box">
                                    {{-- <div class="author-thumb">
                                        <img src="../assets/frontend/images/blog/author-thumb-1.jpg" alt="">
                                    </div> --}}
                                    <ul class="meta-info">
                                        {{-- <li><a href="javascript:void(0)">Malay D’soza</a></li> --}}
                                        <li>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <a href="javascript:void(0)">
                                                {{ date('F j, Y', strtotime($blog_details->created_at)) }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="text">
                                    {!! $blog_details->details !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="sidebar-content-box">
                        <!--Start Single Sidebar Box-->
                        <div class="single-sidebar-box">
                            <div class="sidebar-author-box text-center">
                                <div class="img-holder">
                                    <img src="{{ asset('uploads/member')}}/{{ $blog_details->passport_photo}}"
                                        alt="">
                                </div>
                                <div class="title-holder">
                                    <h3>{{$blog_details->writter}}</h3>
                                    {{-- <p>Nostrud aliquip exrcitation laboris<br>nisiut temp duis autey. Lorem
                                        unt<br>ipsum sit amet elit dolor.</p> --}}
                                </div>
                                {{-- <ul class="social-links">
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                </ul> --}}
                            </div>
                        </div>
                        <!--End Single Sidebar Box-->

                        <!--Start Single Sidebar Box-->
                        <div class="single-sidebar-box">
                            <div class="sidebar-categories">
                                <div class="title">
                                    <h3>Categories</h3>
                                </div>
                                <ul class="sidebar-categories-box">

                                    @foreach ($blog_categories as $blog_category)
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                           {{ $blog_category->title }}
                                        </a>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <!--End Single Sidebar Box-->

                        <!--Start Single Sidebar Box-->
                        <div class="single-sidebar-box">
                            <div class="sidebar-campaigns">
                                <div class="title">
                                    <h3>Recent Blogs</h3>
                                </div>
                                <ul class="recent-campaigns recent-news">

                                    @foreach ($latest_blogs as $latest_blog)
                                        <li>
                                            <div class="inner">
                                                <div class="img-box">
                                                    <img style="width: 85px; height:80px"
                                                        src="{{ asset('uploads/blog/' . $latest_blog->banner_img) }}"
                                                        alt="blog image">
                                                    <div class="overlay-content">
                                                        <a href="{{ route('frontend.blogDetails', $latest_blog->id) }}"><i
                                                                class="fa fa-link" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                                <div class="title-box">
                                                    <h4><a href="{{ route('frontend.blogDetails', $latest_blog->id) }}">
                                                            {{ \Illuminate\Support\Str::limit($latest_blog->title, 15) }}
                                                        </a></h4>
                                                    <p> {{ date('F j, Y', strtotime($latest_blog->created_at)) }}</p>
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
    <!--End Cause Details Area-->
@endsection
