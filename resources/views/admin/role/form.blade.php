@extends('admin.master')

@if (isset($editModeData))
    @section('title', 'Edit Role')
    @section('toolbarTitle', 'Edit Role')
@else
    @section('title', 'Create Role')
    @section('toolbarTitle', 'Create Role')
@endif

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
                                    <rect x="5" y="5" width="5" height="5" rx="1"
                                        fill="#000000"></rect>
                                    <rect x="14" y="5" width="5" height="5" rx="1"
                                        fill="#000000" opacity="0.3"></rect>
                                    <rect x="5" y="14" width="5" height="5" rx="1"
                                        fill="#000000" opacity="0.3"></rect>
                                    <rect x="14" y="14" width="5" height="5" rx="1"
                                        fill="#000000" opacity="0.3"></rect>
                                </g>
                            </svg>
                            <span class="card-label fw-bolder fs-3 mb-1"> {{ isset($editModeData) ? 'Edit' : 'Create' }}
                                Role</span>
                        </span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="{{ route('role.index') }}" class="btn btn-sm btn-light-success">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="5" y="5" width="5" height="5" rx="1"
                                            fill="#000000"></rect>
                                        <rect x="14" y="5" width="5" height="5" rx="1"
                                            fill="#000000" opacity="0.3"></rect>
                                        <rect x="5" y="14" width="5" height="5" rx="1"
                                            fill="#000000" opacity="0.3"></rect>
                                        <rect x="14" y="14" width="5" height="5" rx="1"
                                            fill="#000000" opacity="0.3"></rect>
                                    </g>
                                </svg>
                            </span>
                            Role List
                        </a>
                    </div>
                </div>
                <hr>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3">

                    @include('message')

                    <!--begin::Form-->
                    <form class="form" method="POST"
                        action="{{ isset($editModeData) ? route('role.update', $editModeData->id) : route('role.store') }}">
                        @csrf

                        @isset($editModeData)
                            @method('PUT')
                        @endisset

                        <div class="row mb-5">
                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Role Name</label>
                                <input type="text"
                                    class="form-control form-control-solid @error('role_name') is-invalid @enderror"
                                    placeholder="Enter role name" name="role_name"
                                    value="{{ $editModeData->role_name ?? old('role_name') }}" />
                                @error('role_name')
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
