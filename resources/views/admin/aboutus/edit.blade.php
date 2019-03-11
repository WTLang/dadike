{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 用户建议标签 --}}
	@section('cxy_10', 'active open')

@section('content_01')
<div id="content">
	<div id="content-header">
		<h1>处理建议</h1>
	</div>
	<div id="breadcrumb">
		<a href="/admin/aboutus" title="Go to Home" class="tip-bottom"><i class="icon icon-asterisk"></i>用户建议</a>
		<a href="#" class="current">解决回复</a>
	</div>


@if (session('aboutus_edit_error'))
	<div class="alert alert-error">
		<button class="close" data-dismiss="alert">×</button>
		<strong>内容是空的!</strong>
	</div>
@endif

	<div class="span12">
		<div class="widget-box">
			<div class="widget-title">
				<h5>来自于...</h5>
			</div>
			<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
				<div class="widget-content" style="padding-left: 50px;">
					建议人 : {{ $au_data[0]->au_name }}
				</div>
				<div class="widget-content" style="padding-left: 50px;">
					问&nbsp;&nbsp;&nbsp;&nbsp;题 : {{ $au_data[0]->au_message }}
				</div>
				<div style="padding-left: 42px;padding-top: 15px;">解决方法:</div>
					
				<form action="/admin/aboutus/{{ $au_data[0]->au_id }}" style="padding-left: 110px;padding-bottom: 50px;" method="post">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<textarea name="up_message" cols="20" rows="10" style="resize:none;width: 600px;"></textarea><br>
					<input class="btn btn-info btn-large" type="submit" value="回复">
				</form>
			</div>
		</div>
	</div>

@endsection
{{-- 后台内容填充结束 --}}