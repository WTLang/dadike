{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 后台内容填充开始 --}}

{{-- 仪表盘标签 --}}
	@section('cxy_01', 'active open')	
	@section('bxy_01', '')
	@section('bxy_02', 'active')

@section('content_01')
		{{-- 统计表开始 --}}
		<div id="content">
			<div id="content-header">
				<h1>大迪克</h1>
				<div class="btn-group">
					<a class="btn btn-large tip-bottom" title="消息" style="width: 60px;">
						<i class="icon-comment"></i>
						<span class="label label-important" style="width: 20px;">0</span>
					</a>
				</div>
			</div>
			<div id="breadcrumb">
				<a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>分析</a>
				<a href="#" class="current">总览</a>
			</div>
		</div>
		
		{{-- 统计表结束 --}}
		
@endsection
{{-- 后台内容填充结束 --}}