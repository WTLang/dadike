{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 后台内容填充开始 --}}

{{-- 仪表盘标签 --}}
	@section('cxy_01', '')	
		@section('bxy_01', '')
		@section('bxy_02', '')

{{-- 用户管理标签 --}}
	@section('cxy_02', '')
		@section('bxy_03', '')
		@section('bxy_04', '')

{{-- 文章管理标签 --}}
	@section('cxy_03', '')
		@section('bxy_05', '')
		@section('bxy_06', '')
		@section('bxy_07', '')

{{-- 文章分类标签 --}}
	@section('cxy_04', 'active open')
		@section('bxy_08', '')
		@section('bxy_09', 'active')
		@section('bxy_10', '')

{{-- 文章排行标签 --}}
	@section('cxy_05', '')
		@section('bxy_11', '')
		@section('bxy_12', '')
		@section('bxy_13', '')

{{-- 友情链接标签 --}}
	@section('cxy_06', '')
		@section('bxy_14', '')
		@section('bxy_15', '')
		@section('bxy_16', '')

{{-- 用户权限标签 --}}
	@section('cxy_07', '')
		@section('bxy_17', '')
		@section('bxy_18', '')

{{-- 评论管理标签 --}}
	@section('cxy_08', '')
		@section('bxy_19', '')

{{-- 广告管理标签 --}}
	@section('cxy_09', '')
		@section('bxy_20', '')
		@section('bxy_21', '')
		@section('bxy_22', '')

{{-- 用户管理标签 --}}
	@section('cxy_10', '')
		@section('bxy_23', '')
		@section('bxy_24', '')


@section('content_01')
	

	{{-- 文章分类开始 --}}
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
			<a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>文章分类</a>
			<a href="/admin/index" class="current">添加分类</a>
		</div>

		@if (session('acm_updata_error_01'))
			<div class="alert alert-error">
				<button class="close" data-dismiss="alert">×</button>
				<strong>发生错误!</strong>分类内容不可以为空.
			</div>
		@endif

		@if (session('acm_updata_error_02'))
			<div class="alert alert-error">
				<button class="close" data-dismiss="alert">×</button>
				<strong>发生错误!</strong>请勿提交重复值.
			</div>
		@endif

		<div class="span12">
			<div class="row-fluid">
					<div class="widget-box">
						<div class="widget-title">
							<span class="icon">
								<i class="icon-align-justify"></i>									
							</span>
							<h5>文章分类添加</h5>
						</div>
						<div class="widget-content nopadding">
							<form action="/admin/acm/{{ $edit_id }}" method="post" class="form-horizontal">
								{{ csrf_field() }}
								{{ method_field('put') }}
								<div class="control-group">
									<label class="control-label">文章分类名称</label>
									<div class="controls">
										<input type="text" name="acm_name" value="{{ $edit_acm_name }}">
									</div>
								</div>
								<div class="form-actions">
									<input type="submit" class="btn btn-inverse btn-large" value="修改">
									<input type="reset" class="btn btn-large" value="重置">
								</div>
							</form>
						</div>
					</div>						
				</div>
			</div>
	{{-- 文章分类结束 --}}

@endsection
{{-- 后台内容填充结束 --}}