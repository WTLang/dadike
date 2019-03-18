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
				<a href="/admin/index" class="current">管理员修改</a>
			</div>
			<div class="widget-box">
				<div class="widget-content nopadding">
			{{-- 显示错误的信息 --}}
	        @if (count($errors) > 0)
	            <div class="alert alert-danger">
	                <ul>
	                    @foreach ($errors->all() as $error)
	                        <li>{{ $error }}</li>
	                    @endforeach
	                </ul>
	            </div>
	        @endif
	        @if (session('eerror'))
			<div class="alert alert-error">
				<button class="close" data-dismiss="alert">×</button>
				<strong>失败!</strong>
			</div>
			@endif
				<form action="/admin/admin/updatepass/{{ $id }}" method="post" class="form-horizontal" />
					{{ csrf_field() }}
					<div class="control-group">
						<label class="control-label">用户名</label>
						<div class="controls">
							<input type="text" value="{{ $data[0]->admin_name }}" name = "admin_name" disabled />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">新密码</label>
						<div class="controls">
							<input type="password" name="admin_password" placeholder="输入新密码">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">重复密码</label>
						<div class="controls">
							<input type="password" name="readmin_password" placeholder="重复输入一次密码">
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