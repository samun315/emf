@extends('admin.master')

@section('title', 'Get In Touch List')
@section('toolbarTitle', 'Get In Touch List')

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
                            <span class="card-label fw-bolder fs-3 mb-1">Get In Touch List</span>
                        </span>
                    </h3>
                </div>
                <hr>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3">

                    @include('message')

                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fw-bolder text-muted bg-light">
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Subject</th>
                                    {{-- <th>Message</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody id="tbody">

                                @foreach ($results as $value)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $value->name }} </td>
                                        <td> {{ $value->email }} </td>
                                        <td> {{ $value->phone_number }} </td>
                                        <td> {{ $value->subject }} </td>
                                        {{-- <td> {{ $value->message }} </td> --}}
                                        <td>
                                            <a href="{{ route('admin.contactUs.viewGetInTouch', $value->id) }}"
                                                class="btn btn-sm btn-info">View</a>
                                            <button onclick="removeData({{ $value->id }})"
                                                class="btn btn-danger btn-sm me-1">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>

                    <!-- Display pagination links -->
                    {{ $results->links('vendor.pagination.bootstrap-4') }}

                </div>
                <!--begin::Body-->
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection

@section('page_scripts')

    <script>
        //Delete or Remove Data
        function removeData(id) {
            Swal.fire({
                title: "Are you sure! Delete?",
                text: "Please ensure and then confirm!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then(function(e) {

                if (e.value === true) {
                    var CSRF_TOKEN = "{{ csrf_token() }}";
                    $.ajax({
                        type: 'GET',
                        url: "{{ url('contact-us/get-in-touch/delete') }}/" + id,
                        data: {
                            _token: CSRF_TOKEN
                        },
                        dataType: 'JSON',
                        success: function(results) {

                            if (results.success === true) {
                                Swal.fire("Done!", results.message, "success");
                                $('#tbody').load(document.URL + ' #tbody tr');
                            } else {
                                Swal.fire("Error!", results.message, "error");
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function(dismiss) {
                return false;
            })
        }
    </script>
@endsection
