@extends('home.public.header')


@section('content_01')
{{-- 调用轮播图 --}}
@includeWhen(true,'home.public.lunbo')

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
				<li><a href="#">{{ $vv->acm_name }}</a></li>
			@endforeach
			
			</ul>
		</div>
		@endforeach
	</div>
</div>
{{-- 博客文章分类导航结束 --}}





<div style="height: 1400px;">

	{{-- 左侧内容开始 --}}
	<div class="col-lg-7 col-md-8 col-sm-12 col-xs-12">
	    <div class="post-block" style="width: 800px;margin-left: 100px;margin-top:30px;">
	    		{{-- 博客遍历开始 --}}
	    		@foreach($am_data as $k => $v)
		        <div class="row ">
		            <div class="col-md-6">
		                <div class="post-img" >
		                    <a href="#"><img src="/all_uploads/{{ $v->am_img }}"class="img-responsive" style="padding-top: 40px;"></a>
		                </div>
		            </div>
		            <div class="col-md-6">
		                <div class="post-content">
		                    <h2>
		                    	<a href="获取文章的id" class="title" target="_blank">{{ $v->am_title }}</a>
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
	    	<div style="width: 600px;background-color: red;height: 500px;margin-top: 30px;">
	    		<ul style="background-color: green;padding-top: 30px;"> 
	    			<li>公告</li>
	    			<li>2</li>
	    			<li>3</li>
	    			<li>4</li>
	    			<li>5</li>
	    			<li>6</li>
	    		</ul>
	    	</div>
	    	<div style="width: 600px;background-color: red;height: 350px;margin-top: 30px;">
	    		<ul>
	    			<li>按时间</li>
	    			<li>2</li>
	    			<li>3</li>
	    			<li>4</li>
	    			<li>5</li>
	    			<li>6</li>
	    		</ul>
	    	</div>
	    	<div style="width: 600px;background-color: red;height: 350px;margin-top: 30px;">
	    		<ul>
	    			<li>按推荐</li>
	    			<li>2</li>
	    			<li>3</li>
	    			<li>4</li>
	    			<li>5</li>
	    			<li>6</li>
	    		</ul>
	    	</div>
	    </div>
	    {{-- 右侧内容结束 --}}
	    
	</div>
<div>

</div>
@endsection
