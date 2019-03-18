@extends('home.public.header')


@section('content_01')

@php
	if(empty($advertising_data[0])){
	$res = false;
}else{
	$res = 'true';
}
@endphp

{{-- 调用轮播图 --}}
@includeWhen($res,'home.public.lunbo')

{{-- 博客文章分类导航开始 --}}
<div style="background-color: white;height: 68px;">
	<div style="float: left;padding-left: 30px;padding-top: 20px;">
		@foreach($acm_data_0 as $k => $v)
		<div class="dropdown" style="float: left;padding-left: 10px;">
			<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			{{ $v->acm_name }}
				<span class="caret"></span>
			</button>
			<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
			{{-- 查找当前顶级分类下的一级分类 --}}
			@php
				$acm_data_1 = DB::table('article_categories_manage')->where('acm_path', 'like', '0,'.$v->acm_id)->get();
			@endphp
			@foreach($acm_data_1 as $kk => $vv)
				<li><a href="acm/{{ $vv->acm_id }}/{{ $v->acm_name }}/{{ $vv->acm_name }}">{{ $vv->acm_name }}</a></li>
			@endforeach
			</ul>
		</div>
		@endforeach
	</div>
	<form action="articlecontent/search" method="post">
		<div class="input-group" style="float: right;width: 300px;margin: 20px 20px 0px 0px;">
			{{ csrf_field() }}
            <input type="text" name="search_content" class="form-control" placeholder="搜索文章标题" aria-describedby="basic-addon2">
            <span class="input-group-addon" id="basic-addon2">
				<input type="submit" value="搜索" class="fa fa-search" style="border:0px;background-color: #eee">
        	</span>
        </div>
    </form>
</div>
{{-- 博客文章分类导航结束 --}}

<div style="height: 1400px;clear:both">
	{{-- 左侧内容开始 --}}
	<div class="col-lg-7 col-md-8 col-sm-12 col-xs-12">
	    <div class="post-block" style="width: 800px;margin-left: 100px;margin-top:30px;">
	    		{{-- 博客遍历开始 --}}
	    		@foreach($am_data as $k => $v)
		        <div class="row ">
		            <div class="col-md-6">
		                <div class="post-img" >
		                    <a href="#"><img src="/all_uploads/{{ $v->am_img }}"class="img-responsive" style="padding-top: 40px;width: 360px;height: 235px;"></a>
		                </div>
		            </div>
		            <div class="col-md-6">
		                <div class="post-content">
		                    <h2>
		                    	<a href="articlecontent/{{ $v->am_id }}" class="title" target="_blank">{{ $v->am_title }}</a>
		                    </h2>
		                    <p class="meta">
		                    	<span class="meta-date">{{ $v->am_create_time }}</span> 
		                    	<span class="meta-author">
		                    		由 <a href="javascript:;">{{ $v->am_author }}</a>
		                    	</span>
		                    </p>
		                    <p style=" overflow: hidden;
									  text-overflow:ellipsis;
									  display: -webkit-box;
									  -webkit-line-clamp: 4;
									  -webkit-box-orient: vertical;
									  width:250px;
									">
		                    	{{ $v->am_content }}
		                    </p>
		                </div>
		            </div>
		        </div>
		        <div style="height: 8px;background-color: white;margin-top:60px;"></div>
		        @endforeach
				{{-- 博客遍历结束 --}}
	    	</div>
	    </div>
		{{-- 左侧内容结束 --}}
		
		{{-- 右侧内容开始 --}}
	    <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
	    	<div style="width: 600px;height: 350px;margin-top: 30px;">
	    		<div class="widget widget-archives" style="height: 350px;">
                    {{-- 公告 --}}
                    <h1 class="widget-title"> 公告: </h1>
                    <ul class="listnone">
                        <li style="font-size: 20px;margin: 0px 20px 0px 20px;line-height :35px;">
                        	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        	{{ $web_data }}
                        </li>
                    </ul>
                </div>
	    	</div>
	    	<div style="width: 600px;height: 300px;margin-top: 30px;">
	    		<div class="widget widget-archives">
                    <h2 class="widget-title"> 今日最新: </h2>
                    <ul class="listnone">
                    	@php
                    		$i = 1;
                    		$n = 1;
                    	@endphp
                    	@foreach($am_data_1 as $k => $v)
                        <li style="font-size: 20px;margin: 0px 20px 0px 20px;line-height :35px;">
                        	<a href="articlecontent/{{ $v->am_id }}">{{ $i++ }}. {{ $v->am_title }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
	    	</div>
	    	<div style="width: 600px;height: 350px;margin-top: 30px;">
	    		<div class="widget widget-archives">
                    <h2 class="widget-title"> 随机推荐: </h2>
                    <ul class="listnone">
                        @foreach($am_data_2 as $k => $v)
                        <li style="font-size: 20px;margin: 0px 20px 0px 20px;line-height :35px;">
                        	<a href="articlecontent/{{ $v->am_id }}">{{ $n++ }}. {{ $v->am_title }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <a href="" style="float: right;">换一批</a>
                </div>
	    	</div>
	    </div>
	    {{-- 右侧内容结束 --}}
	</div>
@endsection




