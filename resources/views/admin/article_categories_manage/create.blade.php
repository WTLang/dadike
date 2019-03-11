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

		@if (session('sort_error'))
			<div class="alert alert-error">
				<button class="close" data-dismiss="alert">×</button>
				<strong>发生错误!</strong> 分类不能为空.
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
							<form action="/admin/acm" method="post" class="form-horizontal">
								{{ csrf_field() }}
								<div class="control-group">
									<label class="control-label">文章分类名称</label>
									<div class="controls">
										<input type="text" name="acm_name">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">所属文章分类</label>
									<div class="btn-group">
										<select name="acm_pid" style="margin-left: 20px;margin-top: 8px;margin-bottom: 10px;">
											<option value="0" >--请选择--</option>


@foreach($data as $k => $v)
	<option value="{{ $v->acm_id }}" @if($mca_id == $v->acm_id) selected @endif >
		{{ $v->acm_name }}</option>
@endforeach
										</select>
									</div>
								</div>
								
								<div class="form-actions">
									<input type="submit" class="btn btn-inverse btn-large" value="添加">
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