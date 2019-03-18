{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 文章管理标签 --}}
	@section('cxy_03', 'active open')
	@section('bxy_06', 'active')
@section('content_01')

		
{{-- 文章添加开始 --}}	
<div id="content">
	<div id="content-header">
		<h1>文章添加</h1>
	</div>
	<div id="breadcrumb">
		<a href="javascript:;" title="Go to Home" class="tip-bottom"><i class="icon icon-asterisk"></i></i> 文章管理</a>
		<a href="javascript:;" class="tip-bottom">添加文章</a>
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
	
	@if (session('article_manage_error'))
		<div class="alert alert-error">
			<button class="close" data-dismiss="alert">×</button>
			<strong>添加失败!</strong> 未知原因,请重试.
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
								<select name="am_acm_id" style="margin-left: 20px;margin-top: 5px;">
									<option  value="" >--请选择--</option>
									@foreach($acm_data as $k => $v )
									<option  value="{{ $v->acm_id }}" >{{ $v->acm_name }}</option>
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