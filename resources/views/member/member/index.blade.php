@extends('admin.master')

@section('title', 'View Member')
@section('toolbarTitle', 'View Member')

@section('main-content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <div id="kt_project_users_card_pane" class="tab-pane fade show active">
                <!--begin::Row-->
                <div class="row g-6 g-xl-9">

                    @foreach ($members as $member)
                        <div class="col-md-4">
                            <!--begin::Card-->
                            <div class="card">
                                <!--begin::Card body-->
                                <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-200px mb-5">

                                        <img src="{{ asset('uploads/member/' . $member->passport_photo) }}" alt="image">
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Name-->
                                    <a href="{{ route('member.viewMemberData', $member->user_id) }}"
                                        class="fs-1 text-gray-800 text-hover-primary fw-bolder mb-0">
                                        {{ $member->user_name }}
                                    </a>
                                    <!--end::Name-->
                                    <!--begin::Position-->
                                    <div class="fw-bold text-gray-400 mb-2">
                                        {{ $member->present_job }}
                                    </div>
                                    <!--end::Position-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                    @endforeach

                </div>
                <!--end::Row-->
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
