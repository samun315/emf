@extends('admin.master')

@section('title', 'Photo Gallery')
@section('toolbarTitle', 'Photo Gallery')

@section('page_style')

    <!-- For Gallery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css"/>

    <style>
        .portfolio-menu {
            text-align: center;
        }

        .portfolio-menu ul li {
            display: inline-block;
            margin: 0;
            list-style: none;
            padding: 10px 15px;
            cursor: pointer;
            -webkit-transition: all 05s ease;
            -moz-transition: all 05s ease;
            -ms-transition: all 05s ease;
            -o-transition: all 05s ease;
            transition: all .5s ease;
        }

        .portfolio-item {
            /*width:100%;*/
        }

        .portfolio-item .item {
            /*width:303px;*/
            float: left;
            margin-bottom: 10px;
        }
    </style>
@endsection
@section('main-content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <div class="card mb-5 mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000"></rect>
                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000"
                                          opacity="0.3"></rect>
                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000"
                                          opacity="0.3"></rect>
                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000"
                                          opacity="0.3"></rect>
                                </g>
                            </svg>
                            <span class="card-label fw-bolder fs-3 mb-1">Photo Gallery</span>
                        </span>
                    </h3>
                </div>
                <hr>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3">

                    <div class="container">
                        <div class="portfolio-menu mt-2 mb-4">
                            <ul>
                                <li class="btn btn-outline-dark active" data-filter="*">All</li>
                                <li class="btn btn-outline-dark" data-filter=".student_photo">Student Photo</li>
                                <li class="btn btn-outline-dark" data-filter=".doctor_photo">Doctor Photo</li>
                                <li class="btn btn-outline-dark text" data-filter=".family_photo">Family Photo</li>
                            </ul>
                        </div>
                        <br><br>
                        <div class="portfolio-item row">

                            @foreach ($members as $gallery)
                                @if($gallery->type === 'Student')
                                    <div class="item student_photo col-lg-3 col-md-4 col-6 col-sm">
                                        <a href="{{ asset('uploads/member_gallery/' . $gallery->image) }}"
                                           class="fancylight popup-btn" data-fancybox-group="light">

                                            <img style="width:263px; height:175px" class="img-fluid"
                                                 src="{{ asset('uploads/member_gallery/' . $gallery->image) }}"
                                                 alt="Student Photo">
                                        </a>
                                        <p class="text-center"> {{ $gallery->caption }} </p>
                                    </div>

                                @elseif($gallery->type === 'Doctor')
                                    <div class="item doctor_photo col-lg-3 col-md-4 col-6 col-sm">
                                        <a href="{{ asset('uploads/member_gallery/' . $gallery->image) }}"
                                           class="fancylight popup-btn" data-fancybox-group="light">

                                            <img style="width:263px; height:175px" class="img-fluid"
                                                 src="{{ asset('uploads/member_gallery/' . $gallery->image) }}"
                                                 alt="Doctor Photo">
                                        </a>
                                        <p class="text-center">{{ $gallery->caption }}</p>
                                    </div>
                                @elseif($gallery->type === 'Family')
                                    <div class="item family_photo col-lg-3 col-md-4 col-6 col-sm">
                                        <a href="{{ asset('uploads/member_gallery/' . $gallery->image) }}"
                                           class="fancylight popup-btn" data-fancybox-group="light">
                                            <img style="width:263px; height:175px" class="img-fluid"
                                                 src="{{ asset('uploads/member_gallery/' . $gallery->image) }}"
                                                 alt="Family Photo">
                                        </a>
                                        <p class="text-center">{{ $gallery->caption }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>
                <!--begin::Body-->
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection

@section('page_scripts')
    <!-- For Gallery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>

    <script>
        $('.portfolio-menu ul li').click(function () {
            $('.portfolio-menu ul li').removeClass('active');
            $(this).addClass('active');

            var selector = $(this).attr('data-filter');
            $('.portfolio-item').isotope({
                filter: selector
            });
            return false;
        });
        $(document).ready(function () {
            var popup_btn = $('.popup-btn');
            popup_btn.magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });
    </script>
@endsection
