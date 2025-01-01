@extends('admin.master')

@section('title', 'All files')
@section('toolbarTitle', 'Files')

@section('main-content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">

            <div class="row gy-5 g-xl-8">
                @foreach ($results as $file)
                <div class="col-xl-3 text-center">
                    <a target="_balnk" href="{{asset('uploads/document')}}/{{$file->document_file}}"><img src="{{asset('assets/images/excel-icon.png')}}" height="100px" width="120px"></a>
                    <p>{{$file->name}}</p>
                </div>
                @endforeach
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
