@extends('home.public.header')


@section('content_01')
{{-- 调用轮播图 --}}

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height: 80px;background-color: white;">
	<h1 style="color: #aa9144;" >
		<a href="/" style="margin-left: 100px;">返回首页</a>
	</h1>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="mb60 text-center section-title">
                <h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">与 '{{ $search }}' 匹配的结果</font></font></h1>
            </div>
        </div>
    </div>
    <div class="row">
    	{{-- 遍历开始 --}}
        @if(isset($data[0]) )
            @foreach($data as $k => $v)
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="div_count" >
                <div class="service-block">
                    <div class="service-icon mb20">
                        <img src="/all_uploads/{{ $v->am_img }}" alt="图片未加载" style="width: 250px;height: 150px;"> </div>
                    <div class="service-content">
                        <h2><a href="/articlecontent/{{ $v->am_id }}" class="title "><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $v->am_title }}</font></font></a></h2>
                        <p style="max-width: 200px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $v->am_content }}</font></font></p>
                    </div>
                </div>
            </div>
            @endforeach
        @else
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="div_count" >
            <div class="service-block" style="margin-left: 300px;">
                <h1>未匹配到有关的内容,请返回<a href="/">首页</a>重试</h1>
            </div>
        </div>
        @endif
        {{-- 遍历结束 --}}
    </div>
</div>

@endsection

