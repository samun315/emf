@extends('admin.master')

@if (isset($editModeData))
    @section('title', 'Edit Member')
    @section('toolbarTitle', 'Edit Member')
@else
    @section('title', 'Create Member')
    @section('toolbarTitle', 'Create Member')
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
                                Member</span>
                        </span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.member.index') }}" class="btn btn-sm btn-light-success">
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
                            Manage Member
                        </a>
                    </div>
                </div>
                <hr>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3">

                    @include('message')

                    <!--begin::Form-->
                    <form class="form" method="POST" id="kt_member_form" enctype="multipart/form-data"
                        action="{{ isset($editModeData) ? route('admin.member.update', $editModeData->id) : route('admin.member.store') }}">
                        @csrf

                        @isset($editModeData)
                            @method('PUT')

                            <input type="text" hidden name="member_id" value="{{ $editModeData->id }}">
                            <input type="text" hidden name="user_id" value="{{ $editModeData->user_id }}">
                        @endisset

                        <div class="row mb-5">

                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Name</label>
                                <input type="text"
                                    class="form-control form-control-solid @error('name') is-invalid @enderror"
                                    placeholder="Enter name" name="name"
                                    value="{{ $editModeData->name ?? old('name') }}" required/>
                                @error('name')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">Email</label>
                                <input type="email"
                                    class="form-control form-control-solid @error('email') is-invalid @enderror"
                                    placeholder="Enter email" name="email"
                                    value="{{ $editModeData->email ?? old('email') }}" required/>
                                @error('email')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Phone Number</label>
                                <input type="text"
                                    class="form-control form-control-solid @error('phone_number') is-invalid @enderror"
                                    placeholder="Enter phone number" name="phone_number"
                                    value="{{ $editModeData->phone_number ?? old('phone_number') }}" />
                                @error('phone_number')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Present Job</label>
                                <input type="text"
                                    class="form-control form-control-solid @error('present_job') is-invalid @enderror"
                                    placeholder="Enter present job" name="present_job"
                                    value="{{ $editModeData->present_job ?? old('present_job') }}" />
                                @error('present_job')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Date Of Bith</label>
                                <input type="text"
                                    class="form-control form-control-solid @error('date_of_birth') is-invalid @enderror"
                                    placeholder="Enter date of bith" name="date_of_birth"
                                    value="{{ $editModeData->date_of_birth ?? old('date_of_birth') }}" />
                                @error('date_of_birth')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Spouse Name</label>
                                <input type="text"
                                    class="form-control form-control-solid @error('spouse_name') is-invalid @enderror"
                                    placeholder="Enter spouse name" name="spouse_name"
                                    value="{{ $editModeData->spouse_name ?? old('spouse_name') }}" />
                                @error('spouse_name')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Personal Charity</label>
                                <input type="text"
                                    class="form-control form-control-solid @error('personal_charity') is-invalid @enderror"
                                    placeholder="Enter personal charity" name="personal_charity"
                                    value="{{ $editModeData->personal_charity ?? old('personal_charity') }}" />
                                @error('personal_charity')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Philosopy Life</label>
                                <input type="text"
                                    class="form-control form-control-solid @error('philosopy_life') is-invalid @enderror"
                                    placeholder="Enter philosopy life" name="philosopy_life"
                                    value="{{ $editModeData->philosopy_life ?? old('philosopy_life') }}" />
                                @error('philosopy_life')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Present Address</label>
                                <textarea class="form-control form-control-solid" placeholder="Enter present address" name="present_address"
                                    data-kt-autosize="true">{{ $editModeData->present_address ?? old('present_address') }}</textarea>
                                @error('present_address')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Permanent Address</label>
                                <textarea class="form-control form-control-solid" placeholder="Enter permanent address" name="permanent_address"
                                    data-kt-autosize="true">{{ $editModeData->permanent_address ?? old('permanent_address') }}</textarea>
                                @error('permanent_address')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Village Address</label>
                                <textarea class="form-control form-control-solid" placeholder="Enter village address" name="village_address"
                                    data-kt-autosize="true">{{ $editModeData->village_address ?? old('village_address') }}</textarea>

                                @error('village_address')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Children (Name, Education etc.)</label>
                                <textarea class="form-control form-control-solid" placeholder="Enter children (Name, Education etc.)"
                                    name="children_details" data-kt-autosize="true">{{ $editModeData->children_details ?? old('children_details') }}</textarea>
                                @error('children_details')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">
                                    Special Occasions
                                </label>
                                <p>(Marriage Anniversary, any memorable days, etc.)</p>
                                <textarea class="form-control form-control-solid" placeholder="Enter special occasions" name="special_occasions"
                                    data-kt-autosize="true">{{ $editModeData->special_occasions ?? old('special_occasions') }}</textarea>
                                @error('special_occasions')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Extra Curicular Activities </label>
                                <p>(Hobbies, Writting, Travelling, Singing, Gardening, etc.)</p>
                                <textarea class="form-control form-control-solid" placeholder="Enter extra curicular activities"
                                    name="extra_curicular_activities" data-kt-autosize="true">{{ $editModeData->extra_curicular_activities ?? old('extra_curicular_activities') }}</textarea>
                                @error('extra_curicular_activities')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Lifetime Achievement</label>
                                <p>(Member of parliament, Academic Awards, etc.)</p>
                                <textarea class="form-control form-control-solid" placeholder="Enter lifetime achievement"
                                    name="lifetime_achievement" data-kt-autosize="true">{{ $editModeData->lifetime_achievement ?? old('lifetime_achievement') }}</textarea>
                                @error('lifetime_achievement')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="required fs-6 fw-bold mb-2">Passport Photo</label>
                                <p>(Colored with white background)</p>
                                <input type="file"
                                    class="form-control form-control-solid @error('passport_photo') is-invalid @enderror"
                                    name="passport_photo" />

                                @isset($editModeData->passport_photo)
                                    <a target="_blank"
                                        href="{{ asset('uploads/member/' . $editModeData->passport_photo) }}">View
                                        Passport Photo</a>
                                @endisset

                                @error('passport_photo')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 fv-row mb-5">
                                <label class="fs-6 fw-bold mb-2">Student photo</label>
                                <input type="file"
                                    class="form-control form-control-solid @error('student_photo') is-invalid @enderror"
                                    name="student_photo" />

                                @isset($editModeData->student_photo)
                                    <a target="_blank"
                                        href="{{ asset('uploads/member/' . $editModeData->student_photo) }}">View
                                        Student photo</a>
                                @endisset

                                @error('student_photo')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 fv-row mb-5">
                                <label class="fs-6 fw-bold mb-2">Doctor photo</label>
                                <input type="file"
                                    class="form-control form-control-solid @error('doctor_photo') is-invalid @enderror"
                                    name="doctor_photo" />

                                @isset($editModeData->doctor_photo)
                                    <a target="_blank"
                                        href="{{ asset('uploads/member/' . $editModeData->doctor_photo) }}">View
                                        Doctor photo</a>
                                @endisset

                                @error('doctor_photo')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 fv-row mb-5">
                                <label class="fs-6 fw-bold mb-2">Family photo</label>
                                <input type="file"
                                    class="form-control form-control-solid @error('family_photo') is-invalid @enderror"
                                    name="family_photo" />

                                @isset($editModeData->family_photo)
                                    <a target="_blank"
                                        href="{{ asset('uploads/member/' . $editModeData->family_photo) }}">View
                                        Family photo</a>
                                @endisset

                                @error('family_photo')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Student photo caption</label>
                                <input type="text"
                                    class="form-control form-control-solid @error('student_photo_caption') is-invalid @enderror"
                                    placeholder="Enter student photo caption" name="student_photo_caption"
                                    value="{{ $editModeData->student_photo_caption ?? old('student_photo_caption') }}" />
                                @error('student_photo_caption')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Doctor photo caption</label>
                                <input type="text"
                                    class="form-control form-control-solid @error('doctor_photo_caption') is-invalid @enderror"
                                    placeholder="Enter doctor photo caption" name="doctor_photo_caption"
                                    value="{{ $editModeData->doctor_photo_caption ?? old('doctor_photo_caption') }}" />
                                @error('doctor_photo_caption')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Family photo caption</label>
                                <input type="text"
                                    class="form-control form-control-solid @error('family_photo_caption') is-invalid @enderror"
                                    placeholder="Enter family photo caption" name="family_photo_caption"
                                    value="{{ $editModeData->family_photo_caption ?? old('family_photo_caption') }}" />
                                @error('family_photo_caption')
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

                            <div class="col-md-6 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">Member Status</label>
                                <select name="member_status"
                                    class="form-select form-select-solid @error('member_status') is-invalid @enderror"
                                    data-control="select2" data-hide-search="true" data-placeholder="Member Status">
                                    <option
                                        {{ isset($editModeData) && $editModeData->member_status == 'Foundation Member' ? 'selected' : '' }}
                                        value="Foundation Member">
                                        Foundation Member</option>
                                    <option
                                        {{ isset($editModeData) && $editModeData->member_status == 'Not Enlisted' ? 'selected' : '' }}
                                        value="Not Enlisted">Not Enlisted
                                    </option>
                                    <option
                                        {{ isset($editModeData) && $editModeData->member_status == 'Departed Friends' ? 'selected' : '' }}
                                        value="Departed Friends">Departed Friends
                                    </option>
                                </select>
                                @error('member_status')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 fv-row mb-5">
                                <label class="fs-5 required fw-bold mb-2">Executive status</label>
                                <select name="executive_status"
                                    class="form-select form-select-solid @error('executive_status') is-invalid @enderror"
                                    data-control="select2" data-hide-search="true" data-placeholder="Executive status" required>

                                    <option
                                        {{ isset($editModeData) && $editModeData->executive_status == 'Chairmen' ? 'selected' : '' }}
                                        value="Chairmen">
                                        Chairmen</option>
                                    <option
                                        {{ isset($editModeData) && $editModeData->executive_status == 'Committee' ? 'selected' : '' }}
                                        value="Committee">Committee
                                    </option>
                                    <option
                                        {{ isset($editModeData) && $editModeData->executive_status == 'Members' ? 'selected' : '' }}
                                        value="Members">Members
                                    </option>
                                </select>
                                @error('executive_status')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 fv-row mb-5">
                                <label class="fs-5 fw-bold mb-2">About Yourself</label>
                                <textarea class="form-control form-control-solid summernote2" placeholder="Enter about yourself"
                                    name="about_your_self" data-kt-autosize="true">{{ $editModeData->about_your_self ?? old('about_your_self') }}</textarea>
                                @error('about_your_self')
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
        var i;

        i = document.querySelector("#kt_member_form");

        $(i.querySelector('[name="date_of_birth"]')).flatpickr({
            dateFormat: "Y-m-d"
        });

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
