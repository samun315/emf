@extends('admin.master')

@section('title', 'Role List')
@section('toolbarTitle', 'Role List')

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
                            <span class="card-label fw-bolder fs-3 mb-1">Role List</span>
                        </span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="{{ route('role.create') }}" class="btn btn-sm btn-light-success">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                        rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                        fill="black" />
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
                                    <th>Role Name</th>
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
                                        <td> {{ $value->role_name }} </td>
                                        <td>
                                            <label class="form-check form-switch form-check-custom form-check-solid">

                                                @if ($value->status == 'YES')
                                                    <input class="form-check-input"
                                                        onchange="updateRoleStatus('NO', {{ $value->id }})"
                                                        name="status" type="checkbox" value="YES" checked="checked" />
                                                @else
                                                    <input class="form-check-input"
                                                        onchange="updateRoleStatus('YES', {{ $value->id }})"
                                                        name="status" type="checkbox" value="NO" />
                                                @endif

                                                <span class="form-check-label fw-bold text-muted">
                                                    {{ $value->status }}
                                                </span>
                                            </label>
                                        </td>
                                        <td>
                                            <a href="{{ route('role.edit', $value->id) }}"
                                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3"
                                                            d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                            fill="black" />
                                                        <path
                                                            d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                            </a>
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
        function updateRoleStatus(status, role_id) {

            var v_token = "{{ csrf_token() }}";

            $.ajax({
                type: "PUT",
                url: "{{ route('role.update.status') }}",
                data: {
                    role_id: role_id,
                    status: status,
                    _token: v_token
                },
                dataType: 'json',
                success: function(res) {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Role status successfully updated.',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    $('#tbody').load(document.URL + ' #tbody tr');
                }
            });
        }

        function refreshRouteMaster() {
            window.location.reload();
        }
    </script>
@endsection
