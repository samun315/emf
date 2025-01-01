<div class="header-top">
    <div class="container">
        <div class="outer-box clearfix">
            <marquee behavior="" direction="" class="notice" scrollamount="5"><p>

                @foreach ($notices as $notice)
                    <a href="#" target="_blank">{{$notice->title}}</a>
                @endforeach


            </p> </marquee>
        </div>
    </div>
</div>
