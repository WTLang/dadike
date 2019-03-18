{{-- 继承后台模板 --}}
@extends('admin.public.header')

{{-- 用户建议标签 --}}
	@section('cxy_10', 'active open')
		@section('bxy_23', 'active')

@section('content_01')
<div id="content">
	<div id="content-header">
		<h1>用户建议</h1>
	</div>
	<div id="breadcrumb">
		<a href="javascript:;" title="Go to Home" class="tip-bottom"><i class="icon icon-asterisk"></i>用户建议</a>
		<a href="javascript:;" class="current">查看信息</a>
	</div>

	@if (session('aboutus_success'))
	<div class="alert alert-success">
		<button class="close" data-dismiss="alert">×</button>
		<strong>添加成功!</strong>
	</div>
	@endif

	@if (session('aboutus_error'))
	<div class="alert alert-error">
		<button class="close" data-dismiss="alert">×</button>
		<strong>删除失败!</strong>
	</div>
	@endif

	@if (session('aboutus_edit_success'))
	<div class="alert alert-success">
		<button class="close" data-dismiss="alert">×</button>
		<strong>又解决一个问题了!</strong>
	</div>
	@endif
	<div class="span12">
		<div class="widget-box">
			<div class="widget-title">
				<h5>查看信息</h5>
			</div>
			<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
				<table class="table table-bordered">
						<tr>
							<th>ID</th>
							<th>联系人</th>
							<th>手机号码</th>
							<th>邮箱</th>
							<th>状态</th>
							<th>用户消息</th>
							<th>回复内容</th>
							<th>操作</th>
						</tr>
						@foreach($about_data as $k=>$v)
						<tr>
							<td style="width: 20px;padding-left: 20px;">{{ $v->au_id }}</td>
							<td style="width: 60px;padding-left: 25px;">{{ $v->au_name }}</td>
							<td style="width: 100px;padding-left: 15px;">{{ $v->au_phone }}</td>
							<td style="width: 150px;padding-left: 40px;">{{ $v->au_email }}</td>
							<td style="width: 60px;padding-left: 20px;color: {{ $v->au_status == 1 ? 'red':'greed' }};">
								{{ $v->au_status == 1 ? '未解决':'已解决' }}
							</td>
							<td style="padding-left: 25px;max-width: 50px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{ $v->au_message }}</td>
							<td style="padding-left: 25px;max-width: 50px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{ $v->au_solve }}</td>
							<td style="width: 120px;padding-left: 20px;">
								<a href="/admin/aboutus/{{ $v->au_id }}/edit" class="btn btn-warning" style="padding-left: 10px;float: right;">回复</a>
								<form action="/admin/aboutus/{{ $v->au_id }}"  method="post">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<input type="submit" class="btn btn-danger"  value="删除" style="padding-left: 10px;">
								</form>
							</td>
						</tr>
						@endforeach
				</table>
			</div>
		</div>
	</div>
@endsection
{{-- 后台内容填充结束 --}}