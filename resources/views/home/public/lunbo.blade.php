{{-- 轮播开始 --}}
  <div class="trent-slider">
    {{-- 轮播图遍历 --}}
    @foreach($advertising_data as $k =>$v)
    <div class="t-slide {{ $v->ad_id == $first_id ? 'current-t-slide': '' }} ">
        <img src="all_uploads/{{ $v->ad_image }}"/>
    </div>
    @endforeach
    <div class="t-slider-controls" >
        <div class="arrow right-arrow">
            <div class="arrow-container">
                <div class="arrow-icon"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
            </div>
        </div>
        <div class="arrow left-arrow">
            <div class="arrow-container">
                <div class="arrow-icon"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
            </div>
        </div>
        <div class="t-load-bar">
            <div class="inner-load-bar"></div>
        </div>
        <div class="t-dots-container">
            <div class="t-slide-dots-wrap">
                <div class="t-slide-dots"></div>
            </div>
        </div>
    </div>
</div>
{{-- 轮播结束 --}}
    <script src="http://cdn.bootcss.com/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
    <script>window.jQuery || document.write('<script src="/reception_public/Rotation/js/jquery-1.11.0.min.js"><\/script>')</script>
    <script src="/reception_public/Rotation/js/main.js"></script>