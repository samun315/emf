@extends('admin.master')

@section('title', 'Video Gallery')
@section('toolbarTitle', 'Video Gallery')

@section('main-content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <div id="kt_project_users_card_pane" class="tab-pane fade show active">
                <!--begin::Row-->
                <div class="row g-6 g-xl-9">
                    <br>
                    <br>

                    <video controls style="width:400px">
                        <source src="uploads/video_gallery/abid's diary.mp4" type="video/mp4">
                    </video>
                    <h4>Abid's Diary</h4>

                </div>
                <!--end::Row-->
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
