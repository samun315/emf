@extends('admin.master')

@if (isset($editModeData))
    @section('title', 'Edit Quote')
    @section('toolbarTitle', 'Edit Quote')
@else
    @section('title', 'Create Quote')
    @section('toolbarTitle', 'Create Quote')
@endif

@section('page_style')
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/summernote/summernote-bs4.css') }}">
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
                            <span class="card-label fw-bolder fs-3 mb-1"> {{ isset($editModeData) ? 'Edit' : 'Create' }}
                                Quote</span>
                        </span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.quotes.index') }}" class="btn btn-sm btn-light-success">
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
                            Manage Quote
                        </a>
                    </div>
                </div>
                <hr>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3">

                    @include('message')

                    <!--begin::Form-->
                    <form class="form" method="POST" enctype="multipart/form-data"
                        action="{{ isset($editModeData) ? route('admin.quotes.update', $editModeData->id) : route('admin.quotes.store') }}">
                        @csrf

                        @isset($editModeData)
                            @method('PUT')

                            <input type="text" hidden name="quote_id" value="{{ $editModeData->id }}">
                        @endisset
                        <input type="hidden" id="token" name="token" value="{{ csrf_token() }}" />
                        <div class="row mb-5">

                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Title</label>
                                <input type="text"
                                    class="form-control form-control-solid @error('title') is-invalid @enderror"
                                    placeholder="Enter title" name="title"
                                    value="{{ $editModeData->title ?? old('title') }}" />
                                @error('title')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Author Name</label>
                                <input type="text"
                                    class="form-control form-control-solid @error('author_name') is-invalid @enderror"
                                    placeholder="Enter author name" name="author_name"
                                    value="{{ $editModeData->author_name ?? old('author_name') }}" />
                                @error('author_name')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Author Address</label>
                                <input type="text"
                                    class="form-control form-control-solid @error('author_address') is-invalid @enderror"
                                    placeholder="Enter author address" name="author_address"
                                    value="{{ $editModeData->author_address ?? old('author_address') }}" />
                                @error('author_address')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Author Image</label>
                                <input type="file"
                                    class="form-control form-control-solid @error('author_image') is-invalid @enderror"
                                    name="author_image" />

                                @isset($editModeData->author_image)
                                    <a target="_blank"
                                        href="{{ asset('uploads/quote/' . $editModeData->author_image) }}">View
                                        Image</a>
                                @endisset

                                @error('author_image')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Active</label>
                                <select name="status"
                                    class="form-select form-select-solid @error('status') is-invalid @enderror"
                                    data-control="select2" data-hide-search="true" data-placeholder="Active">
                                    <option {{ isset($editModeData) && $editModeData->status == 'YES' ? 'selected' : '' }}
                                        value="YES">
                                        YES</option>
                                    <option {{ isset($editModeData) && $editModeData->status == 'NO' ? 'selected' : '' }}
                                        value="NO">NO
                                    </option>
                                </select>
                                @error('status')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Details</label>
                                <textarea class="form-control form-control-solid summernote2" placeholder="Enter details" name="details"
                                    data-kt-autosize="true">{{ $editModeData->details ?? old('details') }}</textarea>
                                @error('details')
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
    <script src="{{ asset('assets/backend/plugins/summernote/summernote-bs4.js') }}"></script>

    <script>
        let IRLS = [];
        $(document).ready(function() {

            $('.summernote2').summernote({
                placeholder: 'Write here...',
                tabsize: 2,
                height: 400,
                callbacks: {
                    onImageUpload: function(image) {
                        sendFile(image[0]);
                    },
                    onMediaDelete: function(target) {
                        removeFile(target[0].src)
                    },
                }
            });

            function sendFile(file, editor, welEditable) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                data = new FormData();
                data.append("file", file); //You can append as many data as you want. Check mozilla docs for this
                $.ajax({
                    data: data,
                    type: "POST",
                    url: "{{ route('admin.summernote.uploadImage') . '?_token=' . csrf_token() }}",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(url) {
                        $('.summernote2').summernote('editor.insertImage', url);
                    }
                });
            }

            function removeFile(file, editor, welEditable) {
                IRLS.push(file)
            }
        });
    </script>
@endsection
