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
	@section('cxy_03', 'active open')
		@section('bxy_05', '')
		@section('bxy_06', 'active')
		@section('bxy_07', '')

{{-- 文章分类标签 --}}
	@section('cxy_04', '')
		@section('bxy_08', '')
		@section('bxy_09', '')
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
		
{{-- 文章添加开始 --}}	
<div id="content">
	<div id="content-header">
		<h1>文章添加</h1>
	</div>
	<div id="breadcrumb">
		<a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon icon-asterisk"></i></i> 文章管理</a>
		<a href="#" class="tip-bottom">添加文章</a>
	</div>

	{{-- 验证内容,显示错误信息 --}}
	@if (count($errors) > 0)
    <div class="alert alert-error">
    	<button class="close" data-dismiss="alert">×</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif

	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title">
						<span class="icon">
						<i class="icon-align-justify"></i>									
						</span>
						<h5>添加文章</h5>
					</div>
					<div class="widget-content nopadding">
						<form action="/admin/am" method="post" class="form-horizontal" enctype="multipart/form-data" />
							{{ csrf_field() }}
							<div class="control-group">
								<label class="control-label">标题</label>
								<div class="controls" style="width: 500px;">
									<input type="text" name="am_title"  value="{{ old('am_title') }}" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">作者</label>
								<div class="controls" style="width: 150px;">
									<input type="text" name="am_author" value="{{ old('am_author') }}" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">日期</label>
								<div class="controls" style="width: 150px;">
									<input type="text" name="am_create_time" value="<?php echo date('Y-m-d',time()); ?>" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">封面图</label>
								<div class="controls">
									<input type="file" name="am_img"/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">分类</label>

								<select name="am_sortname" style="margin-left: 20px;margin-top: 5px;">
									<option  value="0" >--请选择--</option>
									@foreach($acm_data as $k => $v )
									<option  value="{{ old('am_sortname') }}" >{{ $v->acm_name }}</option>
									@endforeach
								</select>
							</div>
							<div class="control-group">
								<label class="control-label">内容</label>
									<textarea name="am_content" rows="15" style="width: 850px;margin-left: 18px;margin-top: 25px;margin-bottom: 20px;">{{ old('am_content') }}</textarea>
							</div>
							<div class="form-actions">
								<input type="submit" class="btn btn-primary" value="添加" style="margin-left: 50px;width: 200px;">
							</div>
						</form>
					</div>
				</div>						
			</div>
		</div>
	</div>

{{-- 文章添加结束 --}}	

@endsection
{{-- 后台内容填充结束 --}}