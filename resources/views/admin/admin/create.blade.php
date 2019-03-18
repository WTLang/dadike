{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 文章分类标签 --}}
@section('cxy_02', 'active open')
		@section('bxy_04', 'active')
@section('content_01')
	

	{{-- 文章分类开始 --}}
	<div id="content">
		<div id="content-header">
			<h1>大迪克</h1>
		</div>
		<div id="breadcrumb">
			<a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>管理员管理</a>
			<a href="/admin/index" class="current">添加管理员</a>
		</div>

		<!-- @if (session('sort_error'))
			<div class="alert alert-error">
				<button class="close" data-dismiss="alert">×</button>
				<strong>发生错误!</strong> 分类不能为空.
			</div>
		@endif -->

		<div class="span12">
			<div class="row-fluid">
					<div class="widget-box">
						<div class="widget-title">
							<span class="icon">
								<i class="icon-align-justify"></i>									
							</span>
							<h5>管理员添加</h5>
						</div>
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
                        @if (session('aerror'))
							<div class="alert alert-error">
								<button class="close" data-dismiss="alert">×</button>
								<strong>添加失败!</strong>
							</div>
						@endif
						@if (session('ierror'))
							<div class="alert alert-error">
								<button class="close" data-dismiss="alert">×</button>
								<strong>请选择权限!</strong>
							</div>
						@endif
						<div class="widget-content nopadding">
							<form action="/admin/admin" method="post" class="form-horizontal">
								{{ csrf_field() }}
								<div class="control-group">
									<label class="control-label">管理员名称</label>
									<div class="controls">
										<input type="text" name="admin_name" placeholder="输入用户名,6-16位,不以数字开头" value="{{ old('admin_name') }}">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">管理员密码</label>
									<div class="controls">
										<input type="password" name="admin_password" placeholder="输入密码,6-16位,不以数字开头">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">重复密码</label>
									<div class="controls">
										<input type="password" name="readmin_password" placeholder="重新输入一次密码">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">管理员邮箱</label>
									<div class="controls">
										<input type="text" name="admin_email" placeholder="输入邮箱" value="{{ old('admin_email') }}">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">管理员权限</label>
									<div class="btn-group">
										<select name="identify" style="margin-left: 20px;margin-top: 8px;margin-bottom: 10px;">
											<option value="0">--请选择--</option>
											@foreach($data as $k => $v)
												<option value="{{ $v->id }}"  >
													{{ $v->rname }}</option>
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
@endsection
{{-- 后台内容填充结束 --}}