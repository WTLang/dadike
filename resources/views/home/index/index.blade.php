@extends('home.public.header')

@section('content_01')

<div style="height: 350px;background-color: red;">
	
</div>

{{-- 博客文章分类导航开始 --}}
<div style="background-color: white;height: 65px;">
	<div style="float: left;padding-left: 30px;padding-top: 10px;">
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


@endsection