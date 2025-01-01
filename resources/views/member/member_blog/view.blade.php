@extends('admin.master')

@section('title', 'View Member Blog')
@section('toolbarTitle', 'View Member Blog')

@section('main-content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <div class="card mb-5 mb-xl-8">
                <!--begin::Body-->
                {{-- <div class="card-body py-3">
                </div> --}}
                <div class="card-body p-lg-20 pb-lg-0">
                    <!--begin::Layout-->
                    <div class="d-flex flex-column flex-xl-row">
                        <!--begin::Content-->
                        <div class="flex-lg-row-fluid me-xl-15">
                            <!--begin::Post content-->
                            <div class="mb-17">
                                <!--begin::Wrapper-->
                                <div class="mb-8">
                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap mb-6">
                                        <!--begin::Item-->
                                        <div class="me-9 my-1">
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                            <span class="svg-icon svg-icon-primary svg-icon-2 me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect x="2" y="2" width="9" height="9" rx="2"
                                                        fill="black"></rect>
                                                    <rect opacity="0.3" x="13" y="2" width="9" height="9"
                                                        rx="2" fill="black"></rect>
                                                    <rect opacity="0.3" x="13" y="13" width="9" height="9"
                                                        rx="2" fill="black"></rect>
                                                    <rect opacity="0.3" x="2" y="13" width="9" height="9"
                                                        rx="2" fill="black"></rect>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                            <!--begin::Label-->
                                            <span class="fw-bolder text-gray-400">
                                                {{ date('d F Y', strtotime($result->created_at)) }} </span>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Title-->
                                    <a href="javascript:void(0)" class="text-dark text-hover-primary fs-2 fw-bolder">
                                        {{ $result->title }}

                                    </a>
                                    <!--end::Title-->
                                    <!--begin::Container-->
                                    <div class="overlay mt-8">
                                        <!--begin::Image-->
                                        <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-350px"
                                            style="background-image:url('{{ asset('uploads/blog/' . $result->banner_img) }}')">
                                        </div>
                                        <!--end::Image-->

                                    </div>
                                    <!--end::Container-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Description-->
                                <div class="fs-5 fw-bold text-gray-600">
                                    <!--begin::Text-->
                                    <div class="mb-8">
                                        {!! $result->details !!}
                                    </div>
                                    <!--end::Text-->
                                </div>

                                <!--end::Description-->
                                <!--begin::Block-->

                                <!--end::Block-->
                            </div>
                            <!--end::Post content-->
                        </div>
                        <!--end::Content-->
                        <!--begin::Sidebar-->
                        <div class="flex-column flex-lg-row-auto w-100 w-xl-300px mb-10">

                            <!--begin::Recent posts-->
                            <div class="m-0">
                                <h4 class="text-black mb-7">Recent Posts</h4>

                                @foreach ($recent_posts as $recent_post)
                                    <!--begin::Item-->
                                    <div class="d-flex mb-7">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-60px symbol-2by3 me-4">
                                            <div class="symbol-label"
                                                style="background-image: url('{{ asset('uploads/blog/' . $recent_post->banner_img) }}')">
                                            </div>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="m-0">
                                            <a href="{{ route('member.viewMemberBlog', $recent_post->id) }}"
                                                class="text-dark fw-bolder text-hover-primary fs-6">
                                                {{ $recent_post->title }}
                                            </a>
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Item-->
                                @endforeach


                            </div>
                            <!--end::Recent posts-->
                        </div>
                        <!--end::Sidebar-->
                    </div>

                    <br>
                    <div class="d-flex justify-content-center align-items-center border-dashed card-rounded p-5 p-lg-10 mb-14">
                        <!--begin::Section-->
                        <div class="text-center flex-shrink-0 me-7 me-lg-13">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-70px symbol-circle mb-2">
                                <img src="{{ asset('uploads/member/' . $result->member_photo) }}" class=""
                                    alt="">
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Info-->
                            <div class="mb-0">
                                <a href="javascript:void(0)"
                                    class="text-gray-700 fw-bolder text-hover-primary">{{ $result->user_name }}</a>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Layout-->
                </div>
                <!--begin::Body-->
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
