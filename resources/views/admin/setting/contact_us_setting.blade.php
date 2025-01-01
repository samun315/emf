@extends('admin.master')

@section('title', 'Edit Contact Us')
@section('toolbarTitle', 'Edit Contact Us')

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
                            <span class="card-label fw-bolder fs-3 mb-1">
                                Edit Contact Us
                            </span>
                        </span>
                    </h3>
                </div>
                <hr>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3">

                    @include('message')

                    <!--begin::Form-->
                    <form class="form" method="POST" id="kt_partner_form"
                        action="{{ route('admin.contactUsSetting.updateContactUs') }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-5">

                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Office Address</label>
                                <input type="text"
                                    class="form-control form-control-solid @error('office_address') is-invalid @enderror"
                                    placeholder="Enter office address" name="office_address"
                                    value="{{ $editModeData->office_address ?? old('office_address') }}" />
                                @error('office_address')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Support Phone Number</label>
                                <input type="text"
                                    class="form-control form-control-solid @error('support_phone') is-invalid @enderror"
                                    placeholder="Enter support phone" name="support_phone"
                                    value="{{ $editModeData->support_phone ?? old('support_phone') }}" />
                                @error('support_phone')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Event Phone Number</label>
                                <input type="text"
                                    class="form-control form-control-solid @error('event_phone') is-invalid @enderror"
                                    placeholder="Enter event phone" name="event_phone"
                                    value="{{ $editModeData->event_phone ?? old('event_phone') }}" />
                                @error('event_phone')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Support Email</label>
                                <input type="email"
                                    class="form-control form-control-solid @error('support_email') is-invalid @enderror"
                                    placeholder="Enter support email" name="support_email"
                                    value="{{ $editModeData->support_email ?? old('support_email') }}" />
                                @error('support_email')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Event Email</label>
                                <input type="email"
                                    class="form-control form-control-solid @error('event_email') is-invalid @enderror"
                                    placeholder="Enter event email" name="event_email"
                                    value="{{ $editModeData->event_email ?? old('event_email') }}" />
                                @error('event_email')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="modal-footer flex-center">
                            <button type="submit" class="btn custom_button_bg_color">
                                <span class="indicator-label">Submit</span>
                            </button>
                            <!--end::Button-->
                        </div>
                        <!--end::Modal footer-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--begin::Body-->
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection

@section('page_scripts')
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection
