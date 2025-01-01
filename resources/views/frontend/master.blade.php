<!DOCTYPE html>
<html lang="en">

<head>

    @include('frontend.layouts.stylesheet')

</head>

<body>

    <div class="boxed_wrapper ltr">

        <!-- page-direction -->
        <div class="page_direction">
            <div class="demo-rtl direction_switch"><button class="rtl">RTL</button></div>
            <div class="demo-ltr direction_switch"><button class="ltr">LTR</button></div>
        </div>
        <!-- page-direction end -->


        <!-- switcher menu -->
        <div class="switcher">
            <div class="switch_btn">
                <button><img src="assets/frontend/images/icon/color-palette.png" alt="Color Palette"> </button>
            </div>
            <div class="switch_menu">
                <!-- color changer -->
                <div class="switcher_container">
                    <ul id="styleOptions" title="switch styling">
                        <li>
                            <a href="javascript: void(0)" data-theme="blue" class="blue-color"></a>
                        </li>
                        <li>
                            <a href="javascript: void(0)" data-theme="pink" class="pink-color"></a>
                        </li>
                        <li>
                            <a href="javascript: void(0)" data-theme="violet" class="violet-color"></a>
                        </li>
                        <li>
                            <a href="javascript: void(0)" data-theme="crimson" class="crimson-color"></a>
                        </li>
                        <li>
                            <a href="javascript: void(0)" data-theme="orange" class="orange-color"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end switcher menu -->

        <!-- Start sidebar widget content -->
        <div class="xs-sidebar-group info-group info-sidebar">
            <div class="xs-overlay xs-bg-black"></div>
            <div class="xs-sidebar-widget">
                <div class="sidebar-widget-container">
                    <div class="widget-heading">
                        <a href="#" class="close-side-widget">X</a>
                    </div>
                    <div class="sidebar-textwidget">
                        <div class="sidebar-info-contents">
                            <div class="content-inner">
                                <div class="logo">
                                    <a href="index.html"><img src="assets/frontend/images/resources/logo-3.png"
                                            alt="" /></a>
                                </div>
                                <div class="content-box">
                                    <h4>About Us</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut
                                        labore et magna aliqua. Ut enim ad minim veniam laboris.</p>
                                </div>
                                <div class="form-inner">
                                    <h4>Get a free quote</h4>
                                    <form action="index.html" method="post">
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="Name" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Email" required="">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="message" placeholder="Message..."></textarea>
                                        </div>
                                        <div class="form-group message-btn">
                                            <button type="submit" class="btn-one btn-one-style2">
                                                <span class="txt"><i class="arrow1 fa fa-check-circle"></i>Submit
                                                    Now</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End sidebar widget content -->


        <!-- Main header-->
        @include('frontend.layouts.header')

        @yield('frontend_main_content')

        @include('frontend.layouts.footer')

        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fa fa-angle-up"></span>
        </button>

    </div>

    @include('frontend.layouts.script')

</body>

</html>
