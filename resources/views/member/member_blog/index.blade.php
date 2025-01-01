@extends('admin.master')

@section('title', 'View Member Blog')
@section('toolbarTitle', 'View Member Blog')

@section('main-content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Home card-->
            <div class="card">
                <!--begin::Body-->
                <div class="card-body p-lg-20">

                    <!--begin::Section-->
                    <div class="mb-17">
                        <!--begin::Content-->
                        <div class="d-flex flex-stack mb-5">
                            <!--begin::Title-->
                            <h3 class="text-black">Latest Blog</h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Content-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed mb-9"></div>
                        <!--end::Separator-->
                        <!--begin::Row-->
                        <div class="row g-10">

                            @if (isset($results) && count($results) > 0)
                                @foreach ($results as $result)
                                    <div class="col-md-4">
                                        <!--begin::Hot sales post-->
                                        <div class="card-xl-stretch me-md-6">
                                            <!--begin::Overlay-->
                                            <a class="d-block overlay" data-fslightbox="lightbox-hot-sales"
                                                href="{{ route('member.viewMemberBlog', $result->blog_id) }}">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                                    style="background-image:url('{{ asset('uploads/blog/' . $result->banner_img) }}')">
                                                </div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                    <i class="bi bi-eye-fill fs-2x text-white"></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                            <!--end::Overlay-->
                                            <!--begin::Body-->
                                            <div class="mt-5">
                                                <!--begin::Title-->
                                                <a href="{{ route('member.viewMemberBlog', $result->blog_id) }}"
                                                    class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">
                                                    {{ $result->title }}
                                                </a>
                                                <!--end::Title-->
                                                <!--begin::Text-->
                                                <div class="fw-bold fs-5 text-gray-600 text-dark mt-3">
                                                    {!! \Illuminate\Support\Str::limit(strip_tags($result->details), 150) !!}
                                                </div>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Hot sales post-->
                                    </div>
                                @endforeach
                            @else
                                <p class="text-center text-danger">No blog available!</p>
                            @endif

                        </div>
                        <!--end::Row-->

                        <br> <br>
                        <div class="separator separator-dashed mb-9"></div>

                        <!-- Display pagination links -->
                        {{ $results->links('vendor.pagination.bootstrap-4') }}

                    </div>
                    <!--end::Section-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Home card-->
        </div>
        <!--end::Container-->
    </div>
@endsection
