@extends('admin.master')

@section('title', 'Get In Touch View')
@section('toolbarTitle', 'Get In Touch View')

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
                            <span class="card-label fw-bolder fs-3 mb-1">Get In Touch View</span>
                        </span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.contactUs.indexGetInTouch') }}" class="btn btn-sm btn-light-success">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000">
                                        </rect>
                                        <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000"
                                            opacity="0.3"></rect>
                                        <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000"
                                            opacity="0.3"></rect>
                                        <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000"
                                            opacity="0.3"></rect>
                                    </g>
                                </svg>
                            </span>
                            Manage Get In Touch
                        </a>
                    </div>
                </div>
                <hr>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3">
                    <div class="row mb-5">

                        <div class="col-md-6 fv-row mb-5">
                            <label class="required fs-5 fw-bold mb-2">Name</label>
                            <input type="text" class="form-control form-control-solid" disabled
                                value="{{ $data->name }}" />
                        </div>

                        <div class="col-md-6 fv-row mb-5">
                            <label class="required fs-5 fw-bold mb-2">Email</label>
                            <input type="text" class="form-control form-control-solid" disabled
                                value="{{ $data->email }}" />
                        </div>

                        <div class="col-md-6 fv-row mb-5">
                            <label class="required fs-5 fw-bold mb-2">Phone Number</label>
                            <input type="text" class="form-control form-control-solid" disabled
                                value="{{ $data->phone_number }}" />
                        </div>

                        <div class="col-md-6 fv-row mb-5">
                            <label class="required fs-5 fw-bold mb-2">Subject</label>
                            <input type="text" class="form-control form-control-solid" disabled
                                value="{{ $data->subject }}" />
                        </div>

                        <div class="col-md-12 fv-row mb-5">
                            <label class="fs-5 fw-bold mb-2">Message</label>
                            <textarea class="form-control form-control-solid" disabled>{{ $data->message }}</textarea>
                        </div>

                    </div>
                </div>
                <!--begin::Body-->
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
