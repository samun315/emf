<script>
    var hostUrl = "assets/";
</script>
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('assets/backend/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/backend/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{ asset('assets/backend/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('assets/backend/js/custom/widgets.js') }}"></script>
<script src="{{ asset('assets/backend/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('assets/backend/js/custom/modals/create-app.js') }}"></script>
<script src="{{ asset('assets/backend/js/custom/modals/upgrade-plan.js') }}"></script>
<!--end::Page Custom Javascript-->
<!--end::Javascript-->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('assets/backend/js/custom/datetimepicker/datetimepicker.js') }}"></script>
{{-- <script src="{{asset('assets/js/ckeditor.js')}}"></script> --}}
<!-- ckeditor -->
{{-- <script src="{{ asset('assets/backend/plugins/ckeditor/ckeditor5_40.0.0_classic_ckeditor.js') }}"></script> --}}

<script>
    $(".alert-success").delay(2000).fadeOut("slow");
</script>

@yield('page_scripts')
