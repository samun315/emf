@extends('admin.master')

@section('title', 'Manage Quotes')
@section('toolbarTitle', 'Manage Quotes')

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
                            <span class="card-label fw-bolder fs-3 mb-1">Manage Quotes</span>
                        </span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.quotes.create') }}" class="btn btn-sm btn-light-success">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                          transform="rotate(-90 11.364 20.364)" fill="black"/>
                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                          fill="black"/>
                                </svg>
                            </span>
                            Add New
                        </a>
                    </div>
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
                                <th>Autor Image</th>
                                <th>Author Name</th>
                                <th>Author Address</th>
                                <th>Title</th>
                                <th>Details</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody id="tbody">

                            @foreach ($results as $value)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td>
                                        <img style="width: 80px; height: 80px; border-radius: 50%"
                                             src="{{ asset('uploads/quote/' . $value->author_image) }}" alt="">
                                    </td>
                                    <td> {{ $value->author_name }} </td>
                                    <td> {{ $value->author_address }} </td>
                                    <td> {{ $value->title }} </td>
                                    <td> {!! $value->details !!} </td>
                                    <td>
                                        <label class="form-check form-switch form-check-custom form-check-solid">

                                            @if ($value->status == 'YES')
                                                <input class="form-check-input"
                                                       onchange="updateStatus('NO', {{ $value->id }})" name="status"
                                                       type="checkbox" value="YES" checked="checked"/>
                                            @else
                                                <input class="form-check-input"
                                                       onchange="updateStatus('YES', {{ $value->id }})" name="status"
                                                       type="checkbox" value="NO"/>
                                            @endif

                                            <span class="form-check-label fw-bold text-muted">
                                                    {{ $value->status }}
                                                </span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.quotes.edit', $value->id) }}"
                                               class="btn btn-primary btn-sm">
                                                Edit
                                            </a>
                                            <button onclick="removeData({{ $value->id }})"
                                                    class="btn btn-danger btn-sm me-1">
                                                Delete
                                            </button>
                                        </div>
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
        function updateStatus(status, quote_id) {

            var CSRF_TOKEN = "{{ csrf_token() }}";

            $.ajax({
                type: "PUT",
                url: "{{ route('admin.quotes.update.status') }}",
                data: {
                    quote_id: quote_id,
                    status: status,
                    _token: CSRF_TOKEN
                },
                dataType: 'json',
                success: function (res) {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Status successfully updated.',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    $('#tbody').load(document.URL + ' #tbody tr');
                }
            });
        }

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
            }).then(function (e) {

                if (e.value === true) {
                    var CSRF_TOKEN = "{{ csrf_token() }}";
                    $.ajax({
                        type: 'GET',
                        url: "{{ url('/quotes/delete') }}/" + id,
                        data: {
                            _token: CSRF_TOKEN
                        },
                        dataType: 'JSON',
                        success: function (results) {

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

            }, function (dismiss) {
                return false;
            })
        }
    </script>
@endsection
