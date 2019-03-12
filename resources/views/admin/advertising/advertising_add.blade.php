{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 后台内容填充开始 --}}

{{-- 广告管理标签 --}}
	@section('cxy_09', 'active open')
		@section('bxy_20', '')
		@section('bxy_21', 'active')
		@section('bxy_22', '')

@section('content_01')
		{{-- 统计表开始 --}}

		<div id="content">

			<div id="content-header">
				

				<h1>添加广告</h1>
			</div>


			{{-- 显示错误消息 开始 --}}

            @if (session('success'))
                <div class="lert alert-success">
                    {{ session('ad_success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-error">
                    {{ session('ad_error') }}
                </div>
            @endif
			<div id="breadcrumb">
				<a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon icon-asterisk"></i></i> 广告管理</a>
				<a href="#" class="tip-bottom">添加广告</a>
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="icon-align-justify"></i>
								</span>										
								<h5>添加广告</h5>
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
								<form action="/admin/advertising" method="post" class="form-horizontal" enctype="multipart/form-data"/>
								{{ csrf_field() }}
									<div class="control-group">
										<label class="control-label">广告名称</label>
										<div class="controls">
											<input type="text" name="ad_name" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">图片地址</label>
										<div class="controls">
											<input type="file" name="ad_image" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">广告链接地址</label>
										<div class="controls">
											<input type="text" name="ad_url" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">联系人</label>
										<div class="controls">
											<input type="text" placeholder=""  name="ad_people"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">联系电话</label>
										<div class="controls">
											<input type="text" placeholder=""  name="ad_phone"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">状态</label>
										<div class="controls">
											<select name="ad_status">
												<option value="1"/>通过
												<option value="0"/>待审
											</select>
										</div>
									</div>
									<div class="form-actions">
										<button type="submit" class="btn btn-primary">添加广告</button>
									</div>
								</form>
							</div>
						</div>						
					</div>
				</div>

		{{-- 统计表结束 --}}

@endsection
{{-- 后台内容填充结束 --}}