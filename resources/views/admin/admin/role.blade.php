{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 后台内容填充开始 --}}

{{-- 用户管理标签 --}}
	@section('cxy_02', 'active open')
		@section('bxy_04', 'active')

@section('content_01')
		{{-- 用户表开始 --}}
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
				<a href="#" title="Go to Home" class="tip-bottom"><i class="icon icon-user"></i>用户管理</a>
				<a href="/admin/index" class="current">管理员角色</a>
			</div>
			<div class="widget-box">
				<div class="widget-content nopadding">
				<form action="/admin/admin/updatarole/{{ $admin->id }}" method="post" class="form-horizontal" />
					{{ csrf_field() }}
					<div class="control-group">
						<label class="control-label">用户名</label>
						<div class="controls">
							<input type="text" value="{{ $admin->admin_name }}" disabled />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">职位</label>
						<div class="controls">
							@foreach($role_data as $k=>$v)
							<label><input type="radio" name="rids[]" value="{{ $v->id }}" @if($admin->identify == $v->id)checked  @endif />{{ $v->rname }}</label>
							@endforeach
						</div>
					</div>
					<div class="control-group">
						<input type="submit" name="" value="提交" class="btn btn-success btn-large" style="float: right;">
					</div>
				</form>
					
				</div>
			</div>
			{{-- 用户表结束 --}}
@endsection
{{-- 后台内容填充结束 --}}