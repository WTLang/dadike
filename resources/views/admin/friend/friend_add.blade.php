{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 友情链接标签 --}}
	@section('cxy_06', 'active open')
		@section('bxy_15', 'active')

@section('content_01')
		{{-- 统计表开始 --}}
		<div id="content">
			<div id="content-header">
				<h1>添加友情链接</h1>
			</div>
			{{-- 显示错误消息 开始 --}}
            @if (session('success'))
            <div class="lert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
            @endif
			<div id="breadcrumb">
				<a href="javascript:;" title="Go to Home" class="tip-bottom"><i class="icon icon-asterisk"></i></i> 友情链接</a>
				<a href="javascript:;" class="tip-bottom">添加友情链接</a>
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="icon-align-justify"></i>									
								</span>
								<h5>添加友情链接</h5>
							</div>
							<div class="widget-content nopadding">
								{{-- 显示错误信息 --}}
									@if (count($errors) > 0)
									    <div class="alert alert-error">
									        <ul>
									            @foreach ($errors->all() as $error)
									                <li>{{ $error }}</li>
									            @endforeach
									        </ul>
									    </div>
									@endif
								<form action="/admin/friend" method="post" class="form-horizontal" />
								{{ csrf_field() }}
									<div class="control-group">
										<label class="control-label">网站名称</label>
										<div class="controls">
											<input type="text" name="flk_name" name="fr_name" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">图片地址</label>
										<div class="controls">
											<input type="text" name="flk_image" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">网址</label>
										<div class="controls">
											<input type="text" name="flk_url" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">邮箱</label>
										<div class="controls">
											<input type="text" placeholder=""  name="flk_email"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">网站介绍</label>
										<div class="controls">
											<textarea name="flk_depict"></textarea>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">状态</label>
										<div class="controls">
											<select name="flk_status">
												<option value="1"/>通过
												<option value="0"/>待审
											</select>
										</div>
									</div>
									<div class="form-actions">
										<button type="submit" class="btn btn-primary">添加</button>
									</div>
								</form>
							</div>
						</div>						
					</div>
				</div>
		{{-- 统计表结束 --}}

@endsection
{{-- 后台内容填充结束 --}}