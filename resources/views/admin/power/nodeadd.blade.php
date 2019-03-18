{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 后台内容填充开始 --}}

{{-- 用户管理标签 --}}
	@section('cxy_12', 'active open')
		@section('bxy_30', 'active')

@section('content_01')

<div id="content">

		<div id="content-header">
		<h1>文章添加</h1>
		</div>
		<div id="breadcrumb">
			<a href="javascript:;" title="Go to Home" class="tip-bottom"><i class="icon icon-asterisk"></i></i> 用户管理</a>
			<a href="javascript:;" class="tip-bottom">创建管理员</a>
		</div>

		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title">
						<span class="icon">
							<i class="icon-align-justify"></i>
						</span>
						<h5>创建管理员</h5>
					</div>
					<div class="widget-content nopadding">
						<form action="/admin/node/insert" method="post" class="form-horizontal" />
							{{ csrf_field() }}
							<div class="control-group">
								<label class="control-label">节点描述</label>
								<div class="controls">
									<input type="text" name="ndesc" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">控制器名称</label>
								<div class="controls">
									<input type="text" name="cname" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">方法名称</label>
								<div class="controls">
									<input type="text" name="aname" />
								</div>
							</div>
							<!-- <div class="control-group">
								<label class="control-label">Select input</label>
								<div class="controls">
									<select>
										<option value="123">First option</option>
										<option>3 option</option>
										<option>4 option</option>
										<option>5 option</option>
									</select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Password input</label>
								<div class="controls">
									<input type="password" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Input with description</label>
								<div class="controls">
									<input type="text" />
									<span class="help-block">This is a description</span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Input with placeholder</label>
								<div class="controls">
									<input type="text" placeholder="This is a placeholder..." />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Normal textarea</label>
								<div class="controls">
									<textarea></textarea>
								</div>
							</div>
-->							<div class="form-actions">
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
 						</form>
					</div>
				</div>						
			</div>
		</div>
</div>

@endsection
{{-- 后台内容填充结束 --}}