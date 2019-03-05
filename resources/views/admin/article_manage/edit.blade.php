{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 文章管理标签 --}}
	@section('cxy_03', 'active open')

@section('content_01')

		
{{-- 文章修改开始 --}}	
<div id="content">
	<div id="content-header">
		<h1>文章修改</h1>
	</div>
	<div id="breadcrumb">
		<a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon icon-asterisk"></i></i> 文章管理</a>
		<a href="#" class="tip-bottom">修改文章</a>
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
	
	@if (session('article_update_error'))
		<div class="alert alert-error">
			<button class="close" data-dismiss="alert">×</button>
			<strong>修改失败!</strong> 未知原因,部分内容为空.
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
						<h5>修改文章</h5>
					</div>
					<div class="widget-content nopadding">
						<form action="/admin/am/{{ $edit_data->am_id }}" method="post" class="form-horizontal" enctype="multipart/form-data" />
							{{ csrf_field() }}
							{{ method_field('put') }}
							<div class="control-group">
								<label class="control-label">标题</label>
								<div class="controls" style="width: 500px;">
									<input type="text" name="am_title"  value="{{ $edit_data->am_title }}" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">作者</label>
								<div class="controls" style="width: 150px;">
									<input type="text" name="am_author" value="{{ $edit_data->am_author }}" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">更新日期</label>
								<div class="controls" style="width: 150px;">
									<input type="text" name="am_create_time" value="{{ $edit_data->am_create_time }}" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">封面图</label>
								<div class="controls">
									<input type="file" name="new_am_img" value="" />
									<input type="hidden" name="old_am_img" value="{{ $edit_data->am_img }}" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">分类</label>
								<select name="am_acm_id" style="margin-left: 20px;margin-top: 5px;">
									<option  value="" >--请选择--</option>
									@foreach($acm_sort as $ke => $v )
									<option  value="{{ $v->acm_id }}" {{$v->acm_id == $edit_data->am_acm_id ? 'selected':''}}>{{ $v->acm_name }}</option>
									@endforeach
								</select>
							</div>
							<div class="control-group">
								<label class="control-label">内容</label>
									<textarea name="am_content" rows="15" style="width: 850px;margin-left: 18px;margin-top: 25px;margin-bottom: 20px;">{{ $edit_data->am_content }}</textarea>
							</div>
							<div class="form-actions">
								<input type="submit" class="btn btn-primary" value="修改" style="margin-left: 50px;width: 200px;">
							</div>
						</form>
					</div>
				</div>						
			</div>
		</div>
	</div>

{{-- 文章修改结束 --}}	

@endsection
{{-- 后台内容填充结束 --}}