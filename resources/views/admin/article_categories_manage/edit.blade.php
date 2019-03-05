{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 文章分类标签 --}}
	@section('cxy_04', 'active open')
		@section('bxy_09', 'active')

@section('content_01')
	

	{{-- 文章分类开始 --}}
	<div id="content">
		<div id="content-header">
			<h1>大迪克</h1>
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