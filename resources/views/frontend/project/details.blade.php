@extends('frontend.master')

@section('frontend_main_content')
    <!--Start breadcrumb area-->
    <section class="breadcrumb-area" style="background-image: url(/assets/frontend/images/breadcrumb/breadcrumb-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content text-center">
                        <div class="parallax-scene parallax-scene-1">
                            <div data-depth="0.20" class="parallax-layer shape wow zoomInRight" data-wow-duration="2000ms">
                                <div class="shape1">
                                    <img class="float-bob"
                                        src="{{ asset('assets/frontend/images/shape/breadcrumb-shape1.png') }}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="parallax-scene parallax-scene-1">
                            <div data-depth="0.20" class="parallax-layer shape wow zoomInRight" data-wow-duration="2000ms">
                                <div class="shape2">
                                    <img class="zoominout"
                                        src="{{ asset('assets/frontend/images/shape/breadcrumb-shape2.png') }}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="title">
                            <h2>Project Details</h2>
                        </div>
                        <div class="border-box"></div>
                        <div class="breadcrumb-menu">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><span class="flaticon-right-arrow"></span></li>
                                <li class="active">Project Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->

    <!--Start Cause Details Area-->
    <section class="cause-details-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">

                    @include('message')

                    <div class="cause-details_content">
                        <div class="cause-details-image-box">
                            <img src="{{ asset('uploads/project/' . $project->banner_img) }}" alt="project">
                            <div class="category">
                                <h6>{{ $project->category_name }}</h6>
                            </div>
                        </div>

                        <div class="donate-form-box donate-form-box--style2">
                            <div class="top-title">
                                <h2>{{ $project->title }}</h2>
                            </div>

                            <div class="progress-levels progress-levels-style2">
                                <!--Skill Box-->
                                <div class="progress-box wow animated" style="visibility: visible;">
                                    <div class="inner count-box">
                                        <div class="bar">
                                            <div class="bar-innner">
                                                <div class="bar-fill"
                                                    data-percent="{{ number_format(($project->achieved * 100) / $project->budget, 2) }}"
                                                    title="Book"></div>
                                            </div>
                                        </div>
                                        <div class="bottom-box">
                                            <div class="rate-box">
                                                <p>Achieved<span>BDT {{ number_format($project->achieved, 2) }}</span></p>
                                                <p>Target<span>BDT {{ number_format($project->budget, 2) }}</span></p>
                                            </div>
                                            <div class="skill-percent">
                                                <span class="count-text" data-speed="3000"
                                                    data-stop="{{ number_format(($project->achieved * 100) / $project->budget, 2) }}"></span>
                                                <span class="percent">%</span>
                                                <p class="outer-text">Achieved So Far</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="donation_wrapper">
                                <div class="bottom-box">
                                    @if ($project->project_status == 'Executed' || $project->achieved >= $project->budget)
                                        {{-- <a class="btn-one" href="/project-details?project={{ $project->id }}">
                                            <span class="txt">
                                                <i class="arrow1 fa fa-check-circle"></i>
                                                Read More
                                            </span>
                                        </a> --}}
                                    @else
                                        <button class="btn-one" data-toggle="modal" data-target="#myModal">
                                            <span class="txt">
                                                <i class="arrow1 fa fa-check-circle"></i>
                                                Donate Now
                                            </span>
                                        </button>
                                    @endif
                                    {{-- <div class="btns">
                                        <button class="btn-one" data-toggle="modal" data-target="#myModal">
                                            <span class="txt"><i class="arrow1 fa fa-check-circle"></i>Donate
                                                Now</span>
                                        </button>
                                    </div> --}}

                                </div>
                            </div>

                        </div>

                        <div class="cause-details-text-box-1">
                            <p>
                                {!! $project->details !!}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="sidebar-content-box">

                        <!--Start Single Sidebar Box-->
                        <div class="single-sidebar-box">
                            <div class="sidebar-campaigns">
                                <div class="title">
                                    <h3>Upcoming Project</h3>
                                </div>
                                <ul class="recent-campaigns">

                                    @foreach ($projects as $upcoming_project)
                                        @if ($upcoming_project->project_status == 'Upcoming')
                                            <li>
                                                <div class="inner">
                                                    <div class="img-box">
                                                        <img style="width: 85px; height:72px"
                                                            src="{{ asset('uploads/project/' . $upcoming_project->banner_img) }}"
                                                            alt="upcoming project">
                                                        <div class="overlay-content">
                                                            <a
                                                                href="/project-details?upcoming-project={{ $upcoming_project->id }}"><i
                                                                    class="fa fa-link" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="title-box">
                                                        <h4>
                                                            <a
                                                                href="/project-details?upcoming-project={{ $upcoming_project->id }}">{{ $upcoming_project->title }}</a>
                                                        </h4>
                                                        <div class="btns">
                                                            <a
                                                                href="/project-details?upcoming-project={{ $upcoming_project->id }}">View
                                                                Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <!--End Single Sidebar Box-->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Cause Details Area-->

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Donate Now</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form action="{{ route('frontend.projectDonationRequestStore') }}" method="POST">

                    @csrf

                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="project_or_program_name" class="form-label">Select Project/Program Name<span
                                    class="text-danger">*</span>
                            </label>
                            <select name="project_or_program_name" required id="" class="form-control">
                                <option value="">--Select Project/Program Name--</option>

                                @foreach ($projects as $project)
                                    <option value="project_{{ $project->id }}">{{ $project->title }}
                                    </option>
                                @endforeach

                                @foreach ($programs as $program)
                                    <option value="program_{{ $program->id }}">{{ $program->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                            <input type="text" required class="form-control" name="name" placeholder="Enter name">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email">
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number <span
                                    class="text-danger">*</span></label>
                            <input type="text" required class="form-control" name="phone_number"
                                placeholder="Enter phone number">
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" placeholder="Enter Message" name="message" rows="3"></textarea>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
