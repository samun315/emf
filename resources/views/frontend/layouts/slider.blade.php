<section class="main-slider style1">
    <div class="shape2 paroller"></div>
    <div class="slider-box">
        <!-- Banner Carousel -->
        <div class="banner-carousel owl-theme owl-carousel">
            <!-- Slide -->
            @foreach ($sliders as $slider)
                <div class="slide">
                    <div class="image-layer" style="background-image:url({{ asset('uploads/slider/' . $slider->banner_img) }})">
                    </div>
                    <div class="auto-container">
                        <div class="content">
                            <h3>{{ $slider->tagline }}</h3>
                                <div class="big-title">
                                    <h2>{{ $slider->title }}</h2>
                                </div>
                                <div class="border-box"></div>
                                <div class="text">
                                    <p>{!! $slider->description !!}</p>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one btn-one-style2" href="/how-we-help">
                                        <span class="txt"><i class="arrow1 fa fa-check-circle"></i>how we
                                            help</span>
                                    </a>
                                    <a class="btn-one marlft15" data-toggle="modal" data-target="#myModal">
                                        <span class="txt"><i class="arrow1 fa fa-check-circle"></i>donate
                                            us</span>
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
